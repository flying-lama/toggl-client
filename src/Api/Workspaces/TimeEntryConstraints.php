<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Workspaces;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Entity\Workspace\TimeEntryConstraintEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;

class TimeEntryConstraints extends AbstractApi
{
    /**
     * Get workspace time entry constraints
     *
     * @param int $workspaceId Workspace ID
     *
     * @return TimeEntryConstraintEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/workspaces#get-get-workspace-time-entry-constraints
     */
    public function get(int $workspaceId): TimeEntryConstraintEntity
    {
        $response = $this->requestGet('/workspaces/' . $workspaceId . '/time_entry_constraints')->getJson();

        return new TimeEntryConstraintEntity($response);
    }
}
