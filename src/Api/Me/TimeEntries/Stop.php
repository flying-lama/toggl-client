<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Me\TimeEntries;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Entity\TimeEntryEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;

class Stop extends AbstractApi
{
    /**
     * Stops a workspace time entry
     *
     * @param int $workspaceId Workspace ID
     * @param int $timeEntryId Time entry ID
     *
     * @return TimeEntryEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/time_entries#patch-stop-timeentry
     */
    public function execute(int $workspaceId, int $timeEntryId): TimeEntryEntity
    {
        $url = '/workspaces/' . $workspaceId . '/time_entries/' . $timeEntryId . '/stop';
        $response = $this->requestPatch($url)->getJson();

        return new TimeEntryEntity($response);
    }
}
