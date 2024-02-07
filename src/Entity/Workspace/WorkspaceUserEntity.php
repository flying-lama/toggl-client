<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Workspace;

use FlyingLama\TogglApi\Entity\AbstractEntity;

class WorkspaceUserEntity extends AbstractEntity
{
    /**
     * @var int|null ID
     */
    public ?int $id = null;
    /**
     * @var int|null User ID
     */
    public ?int $userId = null;
    /**
     * @var int|null Workspace ID
     */
    public ?int $workspaceId = null;
    /**
     * @var bool|null Whether the user is admin
     */
    public ?bool $admin = null;
    /**
     * @var bool|null Whether the user is organization admin
     */
    public ?bool $organizationAdmin = null;
    /**
     * @var bool|null Whether the user is workspace admin
     */
    public ?bool $workspaceAdmin = null;
    /**
     * @var string|null Role
     */
    public ?string $role = null;
    /**
     * @var bool|null Active
     */
    public ?bool $active = null;
    /**
     * @var string|null Email address
     */
    public ?string $email = null;
    /**
     * @var string|null Timezone
     */
    public ?string $timezone = null;
    /**
     * @var bool|null Inactive
     */
    public ?bool $inactive = null;
    /**
     * @var string|null Last update date (data refresh)
     */
    public ?string $at = null;
    /**
     * @var string|null Name
     */
    public ?string $name = null;
    /**
     * @var string|null Rate
     */
    public ?string $rate = null;
    /**
     * @var string|null Rate last updated
     */
    public ?string $rateLastUpdated = null;
    /**
     * @var int|null Labour cost
     */
    public ?int $labourCost = null;
    /**
     * @var string|null Invitation URL
     */
    public ?string $inviteUrl = null;
    /**
     * @var string|null Invitation code
     */
    public ?string $invitationCode = null;
    /**
     * @var string|null
     */
    public ?string $avatarFileName = null;
    /**
     * @var int[]|null
     */
    public ?array $groupIds = null;
    /**
     * @var bool|null Is direct
     */
    public ?bool $isDirect = null;
    /**
     * @var int|null Working hours in minutes
     */
    public ?int $workingHoursInMinutes = null;
}
