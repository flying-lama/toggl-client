<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Report\ProjectSummary;

use FlyingLama\TogglApi\Entity\AbstractEntity;

class GraphElementEntity extends AbstractEntity
{
    /**
     * @var int|null Billable amount in Cents
     */
    public ?int $billableAmountInCents = null;
    /**
     * @var array|null By rate
     */
    public ?array $byRate = null;
    /**
     * @var int|null Labour cost in Cents
     */
    public ?int $labourCostInCents = null;
    /**
     * @var int|null Seconds
     */
    public ?int $seconds = null;
}
