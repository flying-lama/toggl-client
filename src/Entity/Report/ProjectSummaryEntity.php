<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Report;

use FlyingLama\TogglApi\Entity\AbstractEntity;
use FlyingLama\TogglApi\Entity\Report\ProjectSummary\GraphElementEntity;
use FlyingLama\TogglApi\Entity\Report\ProjectSummary\RateEntity;

class ProjectSummaryEntity extends AbstractEntity
{
    /**
     * @var int|null Billable amount in Cents
     */
    public ?int $billableAmountInCents = null;
    /**
     * @var GraphElementEntity[]|null Graph
     */
    public ?array $graph = null;
    /**
     * @var int|null Labour cost in Cents
     */
    public ?int $labourCostInCents = null;
    /**
     * @var RateEntity[]|null
     */
    public ?array $rates = null;
    /**
     * @var string|null Resolution
     */
    public ?string $resolution = null;
    /**
     * @var int|null Seconds
     */
    public ?int $seconds = null;

    public function setGraph(?array $graph): void
    {
        $this->graph = $this->multipleChildren($graph, GraphElementEntity::class);
    }

    public function setRate(?array $rate): void
    {
        $this->graph = $this->multipleChildren($rate, RateEntity::class);
    }
}
