<?php

namespace FlyingLama\TogglApi\Api\Request\Insights;

use FlyingLama\TogglApi\Api\Request\AbstractRequest;

class ProjectDataTrendRequest extends AbstractRequest
{
    /**
     * @var bool|null Whether the project is set as billable, optional, premium feature
     */
    public ?bool $billable = null;
    /**
     * @var string|null Start date, should be less than End date
     */
    public ?string $startDate = null;
    /**
     * @var string|null Previous start date
     */
    public ?string $previousPeriodStart = null;
    /**
     * @var string|null End date, should be greater than Start date
     */
    public ?string $endDate = null;
    /**
     * @var int[]|null
     */
    public ?array $projectIds = null;
    /**
     * @var int|null Rounding, optional, duration rounding settings, premium feature
     */
    public ?int $rounding = null;
    /**
     * @var int|null RoundingMinutes, optional, duration rounding minutes settings, premium feature
     */
    public ?int $roundingMinutes = null;
}
