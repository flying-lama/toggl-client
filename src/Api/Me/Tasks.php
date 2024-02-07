<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Me;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Entity\TaskEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;

class Tasks extends AbstractApi
{
    /**
     * Returns tasks from projects in which the user is participating
     *
     * @param int|null $since Retrieve tasks created/modified/deleted since this date using UNIX timestamp
     * @param string $active Include/Exclude tasks marked as done
     *
     * @return array
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see parent::INACTIVE_INCLUDE
     * @see parent::INACTIVE_EXCLUDE
     * @see https://developers.track.toggl.com/docs/api/me#get-tasks
     */
    public function list(?int $since = null, string $active = parent::INACTIVE_EXCLUDE): array
    {
        $response = $this->requestGet(
            '/me/tasks',
            [
                'since' => $since,
                'include_not_active' => $active === parent::INACTIVE_INCLUDE
            ]
        )->getJson();

        $result = [];
        foreach ($response as $key => $row) {
            $result[$key] = new TaskEntity($row);
        }

        return $result;
    }
}
