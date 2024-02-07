<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Reports\Workspace;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Reports\Workspace\Weekly\TimeEntries;

class Weekly extends AbstractApi
{
    public function timeEntries(): TimeEntries
    {
        return new TimeEntries($this->getClient());
    }
}
