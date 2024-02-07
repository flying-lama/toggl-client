<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Me;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Entity\TrackReminderEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;

class TrackReminders extends AbstractApi
{
    /**
     * Returns a list of track reminders
     *
     * @return TrackReminderEntity[]
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/me#get-trackreminders
     */
    public function list(): array
    {
        $response = $this->requestGet('/me/track_reminders')->getJson();

        $result = [];
        foreach ($response as $key => $row) {
            $result[$key] = new TrackReminderEntity($row);
        }

        return $result;
    }
}
