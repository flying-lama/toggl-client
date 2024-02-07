<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Organization\Groups;

use FlyingLama\TogglApi\Entity\AbstractEntity;

class PatchSuccessEntity extends AbstractEntity
{
    /**
     * @var string|null Operation
     */
    public ?string $op = null;
    /**
     * @var string|null Path
     */
    public ?string $path = null;
    /**
     * @var int[]|null Value
     */
    public ?array $value = null;
}
