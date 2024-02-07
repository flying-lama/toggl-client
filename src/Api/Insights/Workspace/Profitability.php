<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Insights\Workspace;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Insights\Workspace\Profitability\Employees;

class Profitability extends AbstractApi
{
    public function employees(): Employees
    {
        return new Employees($this->getClient());
    }
}
