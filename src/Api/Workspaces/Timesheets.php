<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Workspaces;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Request\Workspaces\TimesheetListRequest;
use FlyingLama\TogglApi\Api\Request\Workspaces\TimesheetUpdateRequest;
use FlyingLama\TogglApi\Entity\Workspace\TimesheetEntity;
use FlyingLama\TogglApi\Entity\Workspace\TimesheetListEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;
use ReflectionException;

use function array_filter;
use function implode;

class Timesheets extends AbstractApi
{
    /**
     * Get Timesheets
     *
     * @param int $workspaceId Workspace ID
     * @param TimesheetListRequest|null $listRequest
     *
     * @return TimesheetListEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/approvals#get-get-timesheets
     */
    public function list(int $workspaceId, ?TimesheetListRequest $listRequest): TimesheetListEntity
    {
        $queryParams = $listRequest ? $listRequest->toArray() : [];
        $queryParams['memberIds'] = implode(',', $queryParams['memberIds']);
        $queryParams['approverIds'] = implode(',', $queryParams['approverIds']);
        $queryParams['timesheetSetupIds'] = implode(',', $queryParams['timesheetSetupIds']);
        $queryParams['statuses'] = implode(',', $queryParams['statuses']);
        $queryParams = array_filter($queryParams);

        $response = $this->requestGet('/workspaces/' . $workspaceId . '/timesheets', $queryParams)->getJson();

        return new TimesheetListEntity($response);
    }

    /**
     * Update timesheet
     *
     * @param int $workspaceId Workspace ID
     * @param int $setupId Timesheet setup ID
     * @param string $startDate Start date (YYYY-MM-DD) of the timesheet
     * @param TimesheetUpdateRequest $request
     *
     * @return TimesheetEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/approvals#put-update-timesheets
     */
    public function update(
        int $workspaceId,
        int $setupId,
        string $startDate,
        TimesheetUpdateRequest $request
    ): TimesheetEntity {
        $url = '/workspaces/' . $workspaceId . '/timesheets/' . $setupId . '/' . $startDate;
        $response = $this->requestPut($url, $request->toArray())->getJson();

        return new TimesheetEntity($response);
    }
}
