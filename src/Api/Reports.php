<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api;

use FlyingLama\TogglApi\Api\Reports\Shared;
use FlyingLama\TogglApi\Api\Reports\Workspace;

class Reports extends AbstractApi
{
    public function workspace(): Workspace
    {
        return new Workspace($this->getClient());
    }

    public function shared(): Shared
    {
        return new Shared($this->getClient());
    }
}
