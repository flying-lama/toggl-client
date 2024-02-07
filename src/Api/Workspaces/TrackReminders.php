<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Workspaces;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Request\Workspaces\TrackReminderCreateRequest;
use FlyingLama\TogglApi\Api\Request\Workspaces\TrackReminderUpdateRequest;
use FlyingLama\TogglApi\Entity\TrackReminderEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;
use ReflectionException;

class TrackReminders extends AbstractApi
{
    /**
     * Get workspace track reminders
     *
     * @param int $workspaceId Workspace ID
     *
     * @return TrackReminderEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/workspaces#get-trackreminders
     */
    public function get(int $workspaceId): TrackReminderEntity
    {
        $response = $this->requestGet('/workspaces/' . $workspaceId . '/track_reminders')->getJson();

        return new TrackReminderEntity($response);
    }

    /**
     * Create workspace tracking reminder
     *
     * @param int $workspaceId Workspace ID
     * @param TrackReminderCreateRequest $request Parameter
     *
     * @return TrackReminderEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/workspaces#post-trackreminders
     */
    public function create(int $workspaceId, TrackReminderCreateRequest $request): TrackReminderEntity
    {
        $url = '/workspaces/' . $workspaceId . '/track_reminders';
        $response = $this->requestPut($url, $request->toArray())->getJson();

        return new TrackReminderEntity($response);
    }

    /**
     * Updates a workspace tracking reminder
     *
     * @param int $workspaceId Workspace ID
     * @param int $reminderId Tracking Reminder ID
     * @param TrackReminderUpdateRequest $request Parameter
     *
     * @return TrackReminderEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/workspaces#put-trackreminder
     */
    public function update(int $workspaceId, int $reminderId, TrackReminderUpdateRequest $request): TrackReminderEntity
    {
        $url = '/workspaces/' . $workspaceId . '/track_reminders/' . $reminderId;
        $response = $this->requestPut($url, $request->toArray())->getJson();

        return new TrackReminderEntity($response);
    }

    /**
     * Deletes a workspace tracking reminder
     *
     * @param int $workspaceId Workspace ID
     * @param int $reminderId Tracking Reminder ID
     *
     * @return bool
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/workspaces#delete-trackreminder
     */
    public function delete(int $workspaceId, int $reminderId): bool
    {
        $url = '/workspaces/' . $workspaceId . '/track_reminders/' . $reminderId;

        return $this->requestPut($url)->isSuccessful();
    }
}
