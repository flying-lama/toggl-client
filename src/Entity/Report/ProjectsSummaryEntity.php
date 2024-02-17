<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Report;

use FlyingLama\TogglApi\Entity\AbstractEntity;

class ProjectsSummaryEntity extends AbstractEntity
{
    /**
     * @var int|null Billable seconds
     */
    public ?int $billableSeconds = null;
    /**
     * @var int|null Project ID
     */
    public ?int $projectId = null;
    /**
     * @var int|null Tracked seconds
     */
    public ?int $trackedSeconds = null;
    /**
     * @var int|null User ID
     */
    public ?int $userId = null;
}
