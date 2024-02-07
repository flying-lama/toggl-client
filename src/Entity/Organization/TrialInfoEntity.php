<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Organization;

use FlyingLama\TogglApi\Entity\AbstractEntity;

class TrialInfoEntity extends AbstractEntity
{
    /**
     * @var bool|null Whether the organization's subscription is currently on trial
     */
    public ?bool $trial = null;
    /**
     * @var bool|null Is true, when a trial is available for this organization
     */
    public ?bool $trialAvailable = null;
    /**
     * @var string|null End date of active trial
     */
    public ?string $trialEndDate = null;
    /**
     * @var string|null When the trial payment is due
     */
    public ?string $nextPaymentDate = null;
    /**
     * @var int|null What was the previous plan before the trial
     */
    public ?int $lastPricingPlanId = null;
}
