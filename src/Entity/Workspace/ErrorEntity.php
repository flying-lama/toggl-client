<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Workspace;

use FlyingLama\TogglApi\Entity\AbstractEntity;

class ErrorEntity extends AbstractEntity
{
    /**
     * @var string|null Code
     */
    public ?string $code = null;
    /**
     * @var string|null Message
     */
    public ?string $message = null;
}
