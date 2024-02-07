<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Workspaces;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Request\Workspaces\TimesheetSetupCreateRequest;
use FlyingLama\TogglApi\Api\Request\Workspaces\TimesheetSetupListRequest;
use FlyingLama\TogglApi\Api\Request\Workspaces\TimesheetSetupUpdateRequest;
use FlyingLama\TogglApi\Entity\Workspace\TimesheetSetupEntity;
use FlyingLama\TogglApi\Entity\Workspace\TimesheetSetupListEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;
use ReflectionException;

use function implode;

class TimesheetSetups extends AbstractApi
{
    /**
     * Get Timesheet setup list
     *
     * @param int $workspaceId Workspace ID
     * @param TimesheetSetupListRequest|null $listRequest List request
     *
     * @return TimesheetSetupListEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/approvals#get-get-timesheet-setups
     */
    public function list(int $workspaceId, ?TimesheetSetupListRequest $listRequest = null): TimesheetSetupListEntity
    {
        $queryParams = $listRequest ? $listRequest->toArray() : [];
        $queryParams['memberIds'] = implode(',', $queryParams['memberIds']);
        $queryParams['approverIds'] = implode(',', $queryParams['approverIds']);
        $queryParams = array_filter($queryParams);

        $response = $this->requestGet('/workspaces/' . $workspaceId . '/timesheet_setups', $queryParams)->getJson();

        return new TimesheetSetupListEntity($response);
    }


    /**
     * Create Timesheet setup
     *
     * @param int $workspaceId Workspace ID
     * @param TimesheetSetupCreateRequest $request Parameter
     *
     * @return TimesheetSetupEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/approvals#post-create-a-timesheet-setup
     */
    public function create(int $workspaceId, TimesheetSetupCreateRequest $request): TimesheetSetupEntity
    {
        $response = $this->requestPost(
            '/workspaces/' . $workspaceId . '/timesheet_setups',
            $request->toArray()
        )->getJson();

        return new TimesheetSetupEntity($response);
    }

    /**
     * Update Timesheet setup
     *
     * @param int $workspaceId Workspace ID
     * @param int $setupId Timesheet setup ID
     * @param TimesheetSetupUpdateRequest $request Parameter
     *
     * @return TimesheetSetupEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/approvals#post-update-a-timesheet-setup
     */
    public function update(int $workspaceId, int $setupId, TimesheetSetupUpdateRequest $request): TimesheetSetupEntity
    {
        $url = '/workspaces/' . $workspaceId . '/timesheet_setups/' . $setupId;
        $response = $this->requestPost($url, $request->toArray())->getJson();

        return new TimesheetSetupEntity($response);
    }

    /**
     * Delete Timesheet setup
     *
     * @param int $workspaceId Workspace ID
     * @param int $setupId Timesheet setup ID
     *
     * @return bool
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/approvals#delete-delete-a-timesheet-setup
     */
    public function delete(int $workspaceId, int $setupId): bool
    {
        $url = '/workspaces/' . $workspaceId . '/timesheet_setups/' . $setupId;

        return $this->requestDelete($url)->isSuccessful();
    }
}
