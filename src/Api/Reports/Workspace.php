<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Reports;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Reports\Workspace\Search;
use FlyingLama\TogglApi\Api\Reports\Workspace\Summary;

class Workspace extends AbstractApi
{
    public function search(): Search
    {
        return new Search($this->getClient());
    }

    public function summary(): Summary
    {
        return new Summary($this->getClient());
    }
}
