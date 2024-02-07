<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api;

use FlyingLama\TogglApi\Api\Insights\Workspace;

class Insights extends AbstractApi
{
    public function workspace(): Workspace
    {
        return new Workspace($this->getClient());
    }
}
