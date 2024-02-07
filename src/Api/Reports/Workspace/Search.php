<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Reports\Workspace;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Reports\Workspace\Search\TimeEntries as TimeEntrySearch;

class Search extends AbstractApi
{
    public function timeEntries(): TimeEntrySearch
    {
        return new TimeEntrySearch($this->getClient());
    }
}
