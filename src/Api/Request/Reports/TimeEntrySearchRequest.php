<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Request\Reports;

use FlyingLama\TogglApi\Api\Request\AbstractRequest;
use FlyingLama\TogglApi\Util\ArrayKeyNoTransform;

class TimeEntrySearchRequest extends AbstractRequest
{
    /**
     * @var bool|null Whether the time entry is set as billable (premium feature)
     */
    public ?bool $billable = null;
    /**
     * @var int[]|null[]|null Client ID filter. To filter records with no clients, use [null].
     */
    public ?array $clientIds = null;
    /**
     * @var string|null Description filter
     */
    public ?string $description = null;
    /**
     * @var string|null Start date filter, example "2006-01-02". Should be less than endDate.
     */
    public ?string $startDate = null;
    /**
     * @var string|null End date filter, example "2006-01-02". Should be greater than startDate.
     */
    public ?string $endDate = null;
    /**
     * @var string|null Start time filter
     */
    #[ArrayKeyNoTransform]
    public ?string $startTime = null;
    /**
     * @var int[]|null Group IDs filter
     */
    public ?array $groupIds = null;
    /**
     * @var bool|null Whether time entries should be grouped, default false
     */
    public ?bool $grouped = null;
    /**
     * @var bool|null Whether amounts should be hidden, default false
     */
    public ?bool $hideAmounts = null;
    /**
     * @var int|null Min duration seconds filter. Time Audit only, should be less than maxDurationSeconds
     */
    public ?int $minDurationSeconds = null;
    /**
     * @var int|null Max duration seconds filter. Time Audit only, should be greater than minDurationSeconds.
     */
    public ?int $maxDurationSeconds = null;
    /**
     * @var string|null Order by field, default "date". Can be "date", "user", "duration", "description" or
     *     "last_update"
     */
    public ?string $orderBy = null;
    /**
     * @var string|null Order direction. Can be ASC or DESC
     */
    public ?string $orderDir = null;
    /**
     * @var int|null Number of items per page, default 50
     */
    public ?int $pageSize = null;
    /**
     * @var int|null First ID
     */
    public ?int $firstId = null;
    /**
     * @var int|null First row number
     */
    public ?int $firstRowNumber = null;
    /**
     * @var int|null First timestamp
     */
    public ?int $firstTimestamp = null;
    /**
     * @var string[]|null Posted fields
     */
    public ?array $postedFields = null;
    /**
     * @var int[]|null Project IDs filter
     */
    public ?array $projectIds = null;
    /**
     * @var int|null Whether time should be rounded, default from workspace settings
     */
    public ?int $rounding = null;
    /**
     * @var int|null Rounding minutes, default from workspace settings. Should be 0, 1, 5, 6, 10, 12, 15, 30, 60 or 240
     */
    public ?int $roundingMinutes = null;
    /**
     * @var int[]|null Tag IDs filter
     */
    public ?array $tagIds = null;
    /**
     * @var int[]|null Task IDs filter
     */
    public ?array $taskIds = null;
    /**
     * @var int[]|null Time entry IDs filter
     */
    public ?array $timeEntryIds = null;
    /**
     * @var int[]|null User IDs filter
     */
    public ?array $userIds = null;
}
