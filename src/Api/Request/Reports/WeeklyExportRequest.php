<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Request\Reports;

use FlyingLama\TogglApi\Api\Request\AbstractRequest;
use FlyingLama\TogglApi\Util\ArrayKeyNoTransform;

class WeeklyExportRequest extends AbstractRequest
{
    /**
     * @var bool|null Billable
     */
    public ?bool $billable = null;
    /**
     * @var string|null Calculate
     */
    public ?string $calculate = null;
    /**
     * @var int[]|null Client IDs
     */
    public ?array $clientIds = null;
    /**
     * @var string|null Description
     */
    public ?string $description = null;
    /**
     * @var string|null End date
     */
    public ?string $endDate = null;
    /**
     * @var bool|null Group by task
     */
    public ?bool $groupByTask = null;
    /**
     * @var int[]|null Group IDs
     */
    public ?array $groupIds = null;
    /**
     * @var string|null Grouping
     */
    public ?string $grouping = null;
    /**
     * @var int|null Maximum duration seconds
     */
    public ?int $maxDurationSeconds = null;
    /**
     * @var int|null Minimum duration seconds
     */
    public ?int $minDurationSeconds = null;
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
    /**
     * @var string|null Cents separator (PDF only)
     */
    public ?string $centsSeparator = null;
    /**
     * @var string|null Date format (PDF only)
     */
    public ?string $dateFormat = null;
}
