<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Workspace;

use FlyingLama\TogglApi\Entity\AbstractEntity;

class BulkEditResultEntity extends AbstractEntity
{
    /**
     * @var BulkEditFailureEntity[]|null Failed operations
     */
    public ?array $failure = null;
    /**
     * @var int[]|null IDs for which the patch was successful
     */
    public ?array $success = null;

    protected function setFailure(?array $failure): void
    {
        $this->failure = $this->multipleChildren($failure ?? [], BulkEditFailureEntity::class);
    }
}
