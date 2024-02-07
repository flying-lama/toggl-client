<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Report\TimeEntrySearchResult;

use FlyingLama\TogglApi\Entity\AbstractEntity;

class TimeEntryEntity extends AbstractEntity
{
    /**
     * @var int|null ID
     */
    public ?int $id = null;
    /**
     * @var int|null Seconds
     */
    public ?int $seconds = null;
    /**
     * @var string|null Start date
     */
    public ?string $start = null;
    /**
     * @var string|null Stop date
     */
    public ?string $stop = null;
    /**
     * @var string|null Last update date (data refresh)
     */
    public ?string $at = null;
}
