<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Insights\Workspace;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Insights\Workspace\DataTrends\Projects;

class DataTrends extends AbstractApi
{
    public function projects(): Projects
    {
        return new Projects($this->getClient());
    }
}
