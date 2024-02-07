<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Workspaces;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Me\TimeEntries\Stop;
use FlyingLama\TogglApi\Api\Request\Workspaces\TimeEntryBulkUpdateRequest;
use FlyingLama\TogglApi\Api\Request\Workspaces\TimeEntryCreateRequest;
use FlyingLama\TogglApi\Api\Request\Workspaces\TimeEntryUpdateRequest;
use FlyingLama\TogglApi\Entity\TimeEntryEntity;
use FlyingLama\TogglApi\Entity\Workspace\BulkEditResultEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use FlyingLama\TogglApi\Exception\InvalidParameterException;
use JsonException;
use ReflectionException;

use function implode;

class TimeEntries extends AbstractApi
{
    /**
     * Creates a new workspace time entry
     *
     * @param int $workspaceId Workspace ID
     * @param TimeEntryCreateRequest $request
     *
     * @return TimeEntryEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/time_entries#post-timeentries
     */
    public function create(int $workspaceId, TimeEntryCreateRequest $request): TimeEntryEntity
    {
        $response = $this->requestPost('/workspaces/' . $workspaceId . '/time_entries', $request->toArray())->getJson();

        return new TimeEntryEntity($response);
    }

    /**
     * Bulk editing time entries
     *
     * @param int $workspaceId Workspace ID
     * @param int[] $timeEntryIds Time entry IDs (maximum: 100)
     * @param TimeEntryBulkUpdateRequest $request
     *
     * @return BulkEditResultEntity
     * @throws ClientException
     * @throws HttpException
     * @throws InvalidParameterException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/time_entries#patch-bulk-editing-time-entries
     */
    public function bulkUpdate(
        int $workspaceId,
        array $timeEntryIds,
        TimeEntryBulkUpdateRequest $request
    ): BulkEditResultEntity {
        if (count($timeEntryIds) > 100) {
            throw new InvalidParameterException('timeEntryIds', $timeEntryIds);
        }

        $url = '/workspaces/' . $workspaceId . '/time_entries/' . implode(',', $timeEntryIds);
        $response = $this->requestPatch($url, $request->toArray())->getJson();

        return new BulkEditResultEntity($response);
    }

    /**
     * Updates a workspace time entry
     *
     * @param int $workspaceId Workspace ID
     * @param int $timeEntryId Time entry ID
     * @param TimeEntryUpdateRequest $request
     *
     * @return TimeEntryEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/time_entries#put-timeentries
     */
    public function update(int $workspaceId, int $timeEntryId, TimeEntryUpdateRequest $request): TimeEntryEntity
    {
        $url = '/workspaces/' . $workspaceId . '/time_entries/' . $timeEntryId;
        $response = $this->requestPut($url, $request->toArray())->getJson();

        return new TimeEntryEntity($response);
    }

    /**
     * Deletes a workspace time entry
     *
     * @param int $workspaceId Workspace ID
     * @param int $timeEntryId Time entry ID
     *
     * @return bool
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/time_entries#delete-timeentries
     */
    public function delete(int $workspaceId, int $timeEntryId): bool
    {
        $url = '/workspaces/' . $workspaceId . '/time_entries/' . $timeEntryId;
        return $this->requestDelete($url)->isSuccessful();
    }

    public function stop(): Stop
    {
        return new Stop($this->getClient());
    }
}
