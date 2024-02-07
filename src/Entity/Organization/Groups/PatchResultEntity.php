<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Organization\Groups;

use FlyingLama\TogglApi\Entity\AbstractEntity;

class PatchResultEntity extends AbstractEntity
{
    /**
     * @var PatchFailureEntity[]|null Failed operations
     */
    public ?array $failure = null;
    /**
     * @var PatchSuccessEntity[]|null IDs for which the patch was successful
     */
    public ?array $success = null;

    protected function setFailure(?array $failure): void
    {
        $this->failure = $this->multipleChildren($failure ?? [], PatchFailureEntity::class);
    }

    protected function setSuccess(?array $success): void
    {
        $this->failure = $this->multipleChildren($success ?? [], PatchSuccessEntity::class);
    }
}
