<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Group;

use FlyingLama\TogglApi\Entity\AbstractEntity;

class UserEntity extends AbstractEntity
{
    /**
     * @var string|null Name of user
     */
    public ?string $name = null;
    /**
     * @var int|null User ID
     */
    public ?int $userId = null;
    /**
     * @var bool|null Whether the user is joined
     */
    public ?bool $joined = null;
    /**
     * @var string|null URL to avatar image
     */
    public ?string $avatarUrl = null;
}
