<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Workspace;

use FlyingLama\TogglApi\Entity\AbstractEntity;

class PreferencesEntity extends AbstractEntity
{
    /**
     * @var string|null Logo
     */
    public ?string $logo = null;
}
