<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Request\Insights;

use FlyingLama\TogglApi\Api\Request\AbstractRequest;
use FlyingLama\TogglApi\Util\Caster\Types\CommaSeparatedList;
use FlyingLama\TogglApi\Util\Caster\ValueCaster;

class EmployeeProfitabilityRequest extends AbstractRequest
{
    public const RESOLUTION_DAY = 'day';
    public const RESOLUTION_WEEK = 'week';
    public const RESOLUTION_MONTH = 'month';

    /**
     * @var string|null Currency
     */
    public ?string $currency = null;
    /**
     * @var string|null Start date
     */
    public ?string $startDate = null;
    /**
     * @var string|null End date
     */
    public ?string $endDate = null;
    /**
     * @var int[]|null Group IDs
     */
    #[ValueCaster(CommaSeparatedList::class)]
    public ?array $groupIds = null;
    /**
     * @var string|null Resolution
     * @see self::RESOLUTION_DAY
     * @see self::RESOLUTION_WEEK
     * @see self::RESOLUTION_MONTH
     */
    public ?string $resolution = null;
    /**
     * @var int|null Rounding
     */
    public ?int $rounding = null;
    /**
     * @var int|null Rounding minutes
     */
    public ?int $roundingMinutes = null;
    /**
     * @var int[]|null
     */
    #[ValueCaster(CommaSeparatedList::class)]
    public ?array $userIds = null;
}
