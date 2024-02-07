<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Organization\Groups;

use FlyingLama\TogglApi\Entity\AbstractEntity;

class PatchFailureEntity extends AbstractEntity
{
    /**
     * @var mixed Patch input
     */
    public mixed $patch = null;
    /**
     * @var string|null The operation failure reason
     */
    public ?string $message = null;
}
