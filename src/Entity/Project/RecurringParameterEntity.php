<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Project;

use FlyingLama\TogglApi\Entity\AbstractEntity;

class RecurringParameterEntity extends AbstractEntity
{
    /**
     * @var int|null Custom period, used when "period" field is "custom"
     */
    public ?int $customPeriod = null;
    /**
     * @var int|null Estimated seconds
     */
    public ?int $estimatedSeconds = null;
    /**
     * @var string|null Recurring start date
     */
    public ?string $parameterStartDate = null;
    /**
     * @var string|null Recurring end date
     */
    public ?string $parameterEndDate = null;
    /**
     * @var string|null Period
     */
    public ?string $period = null;
    /**
     * @var string|null Project start date
     */
    public ?string $projectStartDate = null;
}
