<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Reports\Workspace;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Reports\Workspace\Projects\Summary as ProjectSummary;

class Projects extends AbstractApi
{
    public function summary(): ProjectSummary
    {
        return new ProjectSummary($this->getClient());
    }
}
