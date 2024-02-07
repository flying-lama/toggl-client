<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Organization;

use FlyingLama\TogglApi\Entity\AbstractEntity;

class AdminEntity extends AbstractEntity
{
    /**
     * @var int|null User ID
     */
    public ?int $userId = null;
    /**
     * @var string|null User's name
     */
    public ?string $name = null;
}
