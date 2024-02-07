<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Request\Reports;

use FlyingLama\TogglApi\Api\Request\AbstractRequest;
use FlyingLama\TogglApi\Util\ArrayKeyNoTransform;

class ProjectSummaryRequest extends AbstractRequest
{
    /**
     * @var string|null End date
     */
    public ?string $endDate = null;
    /**
     * @var string|null Start time
     */
    #[ArrayKeyNoTransform]
    public ?string $startTime = null;
    /**
     * @var string|null Start date
     */
    public ?string $startDate = null;
}
