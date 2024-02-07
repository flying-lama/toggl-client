<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Insights;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Insights\Workspace\DataTrends;
use FlyingLama\TogglApi\Api\Insights\Workspace\Profitability;

class Workspace extends AbstractApi
{
    public function dataTrends(): DataTrends
    {
        return new DataTrends($this->getClient());
    }

    public function profitability(): Profitability
    {
        return new Profitability($this->getClient());
    }
}
