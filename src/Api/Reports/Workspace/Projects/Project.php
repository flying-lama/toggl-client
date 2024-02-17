<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Reports\Workspace\Projects;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Reports\Workspace\Projects\Project\Summary as ProjectSummary;

class Project extends AbstractApi
{
    public function summary(): ProjectSummary
    {
        return new ProjectSummary($this->getClient());
    }
}
