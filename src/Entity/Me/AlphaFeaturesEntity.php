<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Me;

use FlyingLama\TogglApi\Entity\AbstractEntity;

class AlphaFeaturesEntity extends AbstractEntity
{
    /**
     * @var int|null Feature ID
     */
    public ?int $alphaFeatureId = null;

    /**
     * @var string|null Feature code
     */
    public ?string $code = null;
    /**
     * @var bool|null Whether the feature is enabled
     */
    public ?bool $enabled = null;

    /**
     * @var string|null Deletion date
     */
    public ?string $deletedAt = null;
}
