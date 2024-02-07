<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Insights\Workspace\DataTrends;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Request\Insights\ProjectDataTrendRequest;
use FlyingLama\TogglApi\Entity\Insights\ProjectDataTrendEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;
use ReflectionException;

class Projects extends AbstractApi
{
    /**
     * Get data trends of workspace projects
     *
     * @param int $workspaceId Workspace ID
     * @param ProjectDataTrendRequest $request Parameter
     *
     * @return ProjectDataTrendEntity[]
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/reports/insights#post-load-projects-data-trends
     */
    public function post(int $workspaceId, ProjectDataTrendRequest $request): array
    {
        $url = '/workspace/' . $workspaceId . '/data_trends/projects';
        $response = $this->requestPost($url, $request->toArray());

        $result = [];
        foreach ($response as $key => $row) {
            $result[$key] = new ProjectDataTrendEntity($row);
        }

        return $result;
    }
}
