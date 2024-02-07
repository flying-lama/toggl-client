<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Workspaces;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Organizations\Users\User;
use FlyingLama\TogglApi\Entity\UserEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;

class Users extends AbstractApi
{
    /**
     * Get list of users in workspace
     *
     * @param int $workspaceId Workspace ID
     *
     * @return UserEntity[]
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/workspaces#get-get-workspace-users
     */
    public function list(int $workspaceId): array
    {
        $response = $this->requestGet('/workspaces/' . $workspaceId . '/users')->getJson();

        $result = [];
        foreach ($response as $key => $row) {
            $result[$key] = new UserEntity($row);
        }

        return $result;
    }

    /**
     * Add user to workspace
     *
     * @param int $workspaceId Workspace ID
     * @param int $userId User ID
     *
     * @return bool
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/workspaces#put-update-workspace-user
     */
    public function create(int $workspaceId, int $userId): bool
    {
        $url = '/workspaces/' . $workspaceId . '/users/' . $userId;

        return $this->requestPut($url)->isSuccessful();
    }
}
