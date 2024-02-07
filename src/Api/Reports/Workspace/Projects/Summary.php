<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Reports\Workspace\Projects;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Request\Reports\ProjectSummaryRequest;

class Summary extends AbstractApi
{
    /**
     * @see https://developers.track.toggl.com/docs/reports/summary_reports#post-list-project-users
     */
    public function post(int $workspaceId, ProjectSummaryRequest $request)
    {
        // TODO
    }
}
