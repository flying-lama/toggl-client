<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Me;

use FlyingLama\TogglApi\Entity\AbstractEntity;

class FeatureEntity extends AbstractEntity
{
    /**
     * @var string|null Name
     */
    public ?string $name = null;
    /**
     * @var int|null Feature ID
     */
    public ?int $featureId = null;
    /**
     * @var bool|null Whether the feature is enabled
     */
    public ?bool $enabled = null;
}
