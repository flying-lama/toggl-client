<?php

namespace FlyingLama\TogglApi\Entity\Workspace;

use FlyingLama\TogglApi\Entity\AbstractEntity;

class PasswordResetEntity extends AbstractEntity
{
    /**
     * @var string|null Reset password URL
     */
    public ?string $url = null;
}
