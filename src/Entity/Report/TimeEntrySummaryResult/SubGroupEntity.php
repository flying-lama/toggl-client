<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Report\TimeEntrySummaryResult;

use FlyingLama\TogglApi\Api\Request\Reports\TimeEntrySearchRequest;
use FlyingLama\TogglApi\Entity\AbstractEntity;

class SubGroupEntity extends AbstractEntity
{
    /**
     * @var int|null ID of entity provided via request
     * @see TimeEntrySearchRequest sub_grouping parameter
     */
    public ?int $id = null;
    /**
     * @var string|null Title
     */
    public ?string $title = null;
    /**
     * @var int|null Seconds
     */
    public ?int $seconds = null;
}
