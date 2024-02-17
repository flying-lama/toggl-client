<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Report\ProjectSummary;

use FlyingLama\TogglApi\Entity\AbstractEntity;

class RateEntity extends AbstractEntity
{
    /**
     * @var int|null Billable seconds
     */
    public ?int $billableSeconds = null;
    /**
     * @var string|null Currency
     */
    public ?string $currency = null;
    /**
     * @var int|null Hourly rate in Cents
     */
    public ?int $hourlyRateInCents = null;
}
