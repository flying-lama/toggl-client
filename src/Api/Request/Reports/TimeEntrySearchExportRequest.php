<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Request\Reports;

class TimeEntrySearchExportRequest extends TimeEntrySearchRequest
{
    public const DURATION_FORMAT_CLASSIC = 'classic';
    public const DURATION_FORMAT_DECIMAL = 'decimal';
    public const DURATION_FORMAT_IMPROVED = 'improved';

    /**
     * @var string|null Cents separator (PDF only)
     */
    public ?string $centsSeparator = null;
    /**
     * @var string|null Date format (PDF only)
     */
    public ?string $dateFormat = null;
    /**
     * @var string|null Display mode (PDF only)
     */
    public ?string $displayMode = null;
    /**
     * @var string|null Duration format (PDF only)
     * @see self::DURATION_FORMAT_CLASSIC
     * @see self::DURATION_FORMAT_DECIMAL
     * @see self::DURATION_FORMAT_IMPROVED
     */
    public ?string $durationFormat = null;
    /**
     * @var string|null Hour format (PDF only)
     */
    public ?string $hourFormat = null;
}
