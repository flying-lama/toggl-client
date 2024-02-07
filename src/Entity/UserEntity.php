<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity;

class UserEntity extends AbstractEntity
{
    /**
     * @var int|null Entry ID
     */
    public ?int $id = null;
    /**
     * @var string|null Name
     */
    public ?string $name = null;
    /**
     * @var string|null Email address
     */
    public ?string $email = null;
    /**
     * @var int|null User ID
     */
    public ?int $userId = null;
    /**
     * @var string|null Avatar URL
     */
    public ?string $avatarUrl = null;
    /**
     * @var bool|null ^
     */
    public ?bool $admin = null;
    /**
     * @var bool|null Whether the requester is a the owner of the user
     */
    public ?bool $owner = null;
    /**
     * @var bool|null Whether the user is joined
     */
    public ?bool $joined = null;
    /**
     * @var string|null Invitation code
     */
    public string|null $invitationCode = null;
    /**
     * @var bool|null Whether the user is inactive
     */
    public ?bool $inactive = null;
    /**
     * @var bool|null Whether the user can edit Email
     */
    public ?bool $canEditEmail = null;
    /**
     * @var WorkspaceEntity[]|null Workspaces
     */
    public ?array $workspaces = null;
    /**
     * @var GroupEntity[]|null Groups
     */
    public ?array $groups = null;

    protected function setWorkspaces(?array $workspaces): void
    {
        $this->workspaces = $this->multipleChildren($workspaces ?? [], WorkspaceEntity::class);
    }

    protected function setGroups(?array $groups): void
    {
        $this->groups = $this->multipleChildren($groups ?? [], GroupEntity::class);
    }
}
