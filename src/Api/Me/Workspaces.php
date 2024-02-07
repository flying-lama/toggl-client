<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Me;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Entity\WorkspaceEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;

class Workspaces extends AbstractApi
{
    /**
     * Lists workspaces for given user
     *
     * @param int|null $since Retrieve workspaces created/modified/deleted since this date using UNIX timestamp,
     *     including the dates a workspace member changes
     *
     * @return WorkspaceEntity[]
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/me#get-workspaces
     */
    public function list(?int $since = null): array
    {
        $response = $this->requestGet('/me/workspaces', ['since' => $since])->getJson();

        $result = [];
        foreach ($response as $key => $row) {
            $result[$key] = new WorkspaceEntity($row);
        }

        return $result;
    }
}
