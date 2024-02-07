<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Report\TimeEntrySummaryResult;

use FlyingLama\TogglApi\Api\Request\Reports\TimeEntrySearchRequest;
use FlyingLama\TogglApi\Entity\AbstractEntity;

class GroupEntity extends AbstractEntity
{
    /**
     * @var int|null ID of entity provided via request
     * @see TimeEntrySearchRequest grouping parameter
     */
    public ?int $id = null;

    /**
     * @var SubGroupEntity[]|null 2nd level group items
     */
    public ?array $subGroups = null;

    public function setSubGroups(?array $subGroups): void
    {
        $this->subGroups = $this->multipleChildren($subGroups, SubGroupEntity::class);
    }
}
