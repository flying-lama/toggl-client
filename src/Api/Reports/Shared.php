<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Reports;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Reports\Shared\Report;

class Shared extends AbstractApi
{
    public function report(): Report
    {
        return new Report($this->getClient());
    }
}
