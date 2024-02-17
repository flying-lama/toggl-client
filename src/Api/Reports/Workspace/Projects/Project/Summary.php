<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Reports\Workspace\Projects\Project;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Request\Reports\ProjectSummaryRequest;
use FlyingLama\TogglApi\Entity\Report\ProjectSummaryEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;
use ReflectionException;

class Summary extends AbstractApi
{
    /**
     * Returns project summary
     *
     * @param int $workspaceId Workspace ID
     * @param ProjectSummaryRequest $request Request
     *
     * @return ProjectSummaryEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/reports/summary_reports#post-load-project-summary
     */
    public function post(int $workspaceId, ProjectSummaryRequest $request): ProjectSummaryEntity
    {
        $url = '/workspaces/' . $workspaceId . '/projects/summary';
        $response = $this->requestPost($url, $request->toArray())->getJson();

        return new ProjectSummaryEntity($response);
    }
}
