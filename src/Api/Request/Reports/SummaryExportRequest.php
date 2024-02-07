<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Request\Reports;

use FlyingLama\TogglApi\Api\Request\AbstractRequest;
use FlyingLama\TogglApi\Api\Request\Reports\Summary\AuditFilter;
use FlyingLama\TogglApi\Util\ArrayKeyNoTransform;

class SummaryExportRequest extends AbstractRequest
{
    /**
     * @var AuditFilter|null Audit filter
     */
    public ?AuditFilter $audit = null;
    /**
     * @var bool|null Billable
     */
    public ?bool $billable = null;
    /**
     * @var int[]|null Client IDs
     */
    public ?array $clientIds = null;
    /**
     * @var bool|null Collapse
     */
    public ?bool $collapse = null;
    /**
     * @var string|null Description
     */
    public ?string $description = null;
    /**
     * @var string|null Distinguish rates
     */
    public ?string $distinguishRates = null;
    /**
     * @var string|null Duration format
     */
    public ?string $durationFormat = null;
    /**
     * @var string|null End date
     */
    public ?string $endDate = null;
    /**
     * @var int[]|null Group IDs
     */
    public ?array $groupIds = null;
    /**
     * @var string|null Grouping
     */
    public ?string $grouping = null;
    /**
     * @var bool|null Hide amounts
     */
    public ?bool $hideAmounts = null;
    /**
     * @var bool|null Hide rates
     */
    public ?bool $hideRates = null;
    /**
     * @var bool|null Include time entry IDs
     */
    public ?bool $includeTimeEntryIds = null;
    /**
     * @var int|null Max duration seconds
     */
    public ?int $maxDurationSeconds = null;
    /**
     * @var int|null Min duration seconds
     */
    public ?int $minDurationSeconds = null;
    /**
     * @var string|null Order by
     */
    public ?string $orderBy = null;
    /**
     * @var string|null Order direction
     */
    public ?string $orderDir = null;
    /**
     * @var string[]|null Posted fields
     */
    public ?array $postedFields = null;
    /**
     * @var int[]|null Project IDs
     */
    public ?array $projectIds = null;
    /**
     * @var int|null Rounding
     */
    public ?int $rounding = null;
    /**
     * @var int|null Rounding minutes
     */
    public ?int $roundingMinutes = null;
    /**
     * @var string|null Start time
     */
    #[ArrayKeyNoTransform]
    public ?string $startTime = null;
    /**
     * @var string|null Start date
     */
    public ?string $startDate = null;
    /**
     * @var string|null Sub grouping
     */
    public ?string $subGrouping = null;
    /**
     * @var int[]|null Tag IDs
     */
    public ?array $tagIds = null;
    /**
     * @var int[]|null Task IDs
     */
    public ?array $taskIds = null;
    /**
     * @var int[]|null Time entry IDs
     */
    public ?array $timeEntryIds = null;
    /**
     * @var int[]|null User IDs
     */
    public ?array $userIds = null;
}
