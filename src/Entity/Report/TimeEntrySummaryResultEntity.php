<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Report;

use FlyingLama\TogglApi\Api\Request\Reports\TimeEntrySearchRequest;
use FlyingLama\TogglApi\Entity\AbstractEntity;
use FlyingLama\TogglApi\Entity\Report\TimeEntrySummaryResult\GroupEntity;

class TimeEntrySummaryResultEntity extends AbstractEntity
{
    /**
     * @var GroupEntity[]|null 1st level group items
     * @see TimeEntrySearchRequest grouping parameter
     */
    public ?array $groups = null;

    public function setGroups(?array $groups): void
    {
        $this->groups = $this->multipleChildren($groups, GroupEntity::class);
    }
}
