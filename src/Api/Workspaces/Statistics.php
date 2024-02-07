<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Workspaces;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Entity\Workspace\StatisticsEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;

class Statistics extends AbstractApi
{
    /**
     * Workspace statistics
     *
     * @param int $workspaceId Workspace ID
     *
     * @return StatisticsEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/workspaces#get-workspace-statistics
     */
    public function get(int $workspaceId): StatisticsEntity
    {
        $response = $this->requestGet('/workspaces/' . $workspaceId . '/statistics')->getJson();

        return new StatisticsEntity($response);
    }
}
