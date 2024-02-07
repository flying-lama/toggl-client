<?php

namespace FlyingLama\TogglApi\Api\Workspaces;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Entity\Workspace\PasswordResetEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;

class LostPassword extends AbstractApi
{
    /**
     * Change a lost password
     *
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/workspaces#post-change-a-lost-password
     */
    public function execute(int $workspaceId, int $userId): PasswordResetEntity
    {
        $url = '/workspaces/' . $workspaceId . '/users/' . $userId . '/lost_password';
        $response = $this->requestPost($url);

        return new PasswordResetEntity($response);
    }
}
