<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Report;

use FlyingLama\TogglApi\Entity\AbstractEntity;
use FlyingLama\TogglApi\Entity\Report\TimeEntrySearchResult\TimeEntryEntity;

class TimeEntrySearchResultEntity extends AbstractEntity
{
    /**
     * @var int|null User ID
     */
    public ?int $userId = null;
    /**
     * @var string|null Username
     */
    public ?string $username = null;
    /**
     * @var int|null Project ID
     */
    public ?int $projectId = null;
    /**
     * @var int|null Task ID
     */
    public ?int $taskId = null;
    /**
     * @var bool|null Billable
     */
    public ?bool $billable = null;
    /**
     * @var string|null Description
     */
    public ?string $description = null;
    /**
     * @var int[]|null Tag IDs
     */
    public ?array $tagIds = null;
    /**
     * @var string|null Billable amount in cents
     */
    public ?string $billableAmountInCents = null;
    /**
     * @var string|null Hourly rate in cents
     */
    public ?string $hourlyRateInCents = null;
    /**
     * @var string|null Currency
     */
    public ?string $currency = null;
    /**
     * @var array|null Time entries
     */
    public ?array $timeEntries = null;
    /**
     * @var int|null Row number
     */
    public ?int $rowNumber = null;

    public function setTimeEntries(?array $timeEntries): void
    {
        $this->timeEntries = $this->multipleChildren($timeEntries, TimeEntryEntity::class);
    }
}
