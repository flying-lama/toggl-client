<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Workspace;

use FlyingLama\TogglApi\Entity\AbstractEntity;
use FlyingLama\TogglApi\Entity\Organization\AdminEntity;

class StatisticsEntity extends AbstractEntity
{
    /**
     * @var int|null Workspace ID
     */
    public ?int $workspaceId;

    /**
     * @var AdminEntity[]|null Admin user list
     */
    public ?array $admins = null;
    /**
     * @var int|null Number of members in workspace
     */
    public ?int $membersCount = null;
    /**
     * @var int|null Number of groups in workspace
     */
    public ?int $groupsCount = null;

    public function setAdmins(?array $admins): void
    {
        $this->admins = $this->multipleChildren($admins ?? [], AdminEntity::class);
    }
}
