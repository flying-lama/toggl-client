<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Workspace;

use FlyingLama\TogglApi\Entity\AbstractEntity;

class BulkEditFailureEntity extends AbstractEntity
{
    /**
     * @var int|null The ID for which the patch operation failed
     */
    public ?int $id = null;
    /**
     * @var string|null The operation failure reason
     */
    public ?string $message = null;
}
