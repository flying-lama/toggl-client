<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity;

use FlyingLama\TogglApi\Entity\Group\UserEntity;

class GroupEntity extends AbstractEntity
{
    /**
     * @var int|null Group ID
     */
    public ?int $groupId = null;
    /**
     * @var string|null Group Name
     */
    public ?string $name = null;
    /**
     * @var string|null Last update date (data refresh)
     */
    public ?string $at = null;
    /**
     * @var UserEntity[]|null Group users
     */
    public ?array $users = null;
    /**
     * @var int[]|null Workspace IDs
     */
    public ?array $workspaces = null;

    protected function setUsers(?array $users): void
    {
        $this->users = $this->multipleChildren($users ?? [], UserEntity::class);
    }
}
