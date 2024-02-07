<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Me;

use FlyingLama\TogglApi\Entity\AbstractEntity;

class FeaturesEntity extends AbstractEntity
{
    /**
     * @var FeatureEntity[]|null Features
     */
    public ?array $features = [];

    /**
     * @var int|null Workspace ID
     */
    public ?int $workspaceId;

    protected function setFeatures(?array $features): void
    {
        $this->features = $this->multipleChildren($features ?? [], FeatureEntity::class);
    }
}
