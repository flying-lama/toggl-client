<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Request\Reports\Summary;

use FlyingLama\TogglApi\Api\Request\AbstractRequest;

class GroupFilter extends AbstractRequest
{
    /**
     * @var string|null Audit currency, optional, example "USD", premium feature
     */
    public ?string $currency = null;
    /**
     * @var int|null Audit max amount in cents, optional, premium feature
     */
    public ?int $maxAmountCents = null;
    /**
     * @var int|null Audit max duration in seconds, optional, premium feature
     */
    public ?int $maxDurationSeconds = null;
    /**
     * @var int|null Audit min amount in cents, optional, premium feature
     */
    public ?int $minAmountCents = null;
    /**
     * @var int|null Audit min duration in seconds, optional, premium feature
     */
    public ?int $minDurationSeconds = null;
}
