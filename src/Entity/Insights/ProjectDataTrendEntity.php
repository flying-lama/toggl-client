<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Insights;

use FlyingLama\TogglApi\Entity\AbstractEntity;

class ProjectDataTrendEntity extends AbstractEntity
{
    /**
     * @var int|null Project ID
     */
    public ?int $projectId = null;
    /**
     * @var int[]|null Current period seconds
     */
    public ?array $currentPeriodSeconds = null;
    /**
     * @var int[]|null Previous period seconds
     */
    public ?array $previousPeriodSeconds = null;
    /**
     * @var string|null Start
     */
    public ?string $start = null;
    /**
     * @var int[]|null User IDs
     */
    public ?array $userIds = null;
}
