<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Organizations\Workspaces;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Entity\Workspace\StatisticsEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;

class Statistics extends AbstractApi
{
    /**
     * Statistics for all workspaces in the organization
     *
     * @return StatisticsEntity[]
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/organizations#get-statistics-for-all-workspaces-in-the-organization
     */
    public function list(int $organizationId): array
    {
        $response = $this->requestGet('/organizations/' . $organizationId . '/workspaces/statistics')->getJson();

        $result = [];
        foreach ($response as $key => $row) {
            $resultRow = new StatisticsEntity($row);
            $resultRow->workspaceId = $key;
            $result[$key] = $resultRow;
        }

        return $result;
    }
}
