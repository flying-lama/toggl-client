<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Workspaces;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Entity\Workspace\AlertEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;

class Alerts extends AbstractApi
{
    /**
     * Handles alert requests
     *
     * @param int $workspaceId Workspace ID
     *
     * @return AlertEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/workspaces#post-alerts
     */
    public function post(int $workspaceId): AlertEntity
    {
        $response = $this->requestPost('/workspaces/' . $workspaceId . '/alerts')->getJson();

        return new AlertEntity($response);
    }

    /**
     * Deletes an alert
     *
     * @param int $workspaceId Workspace ID
     * @param int $alertId Alert ID
     *
     * @return bool
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/workspaces#delete-alerts
     */
    public function delete(int $workspaceId, int $alertId): bool
    {
        $url = '/workspaces/' . $workspaceId . '/alerts/' . $alertId;

        return $this->requestDelete($url)->isSuccessful();
    }
}
