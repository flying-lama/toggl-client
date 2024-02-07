<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity;

use FlyingLama\TogglApi\Entity\Organization\TrialInfoEntity;

class OrganizationEntity extends AbstractEntity
{
    /**
     * @var int|null Organization
     */
    public ?int $id = null;
    /**
     * @var string|null Name
     */
    public ?string $name = null;
    /**
     * @var string|null Workspace name
     */
    public ?string $workspaceName = null;
    /**
     * @var int|null Plan ID
     */
    public ?int $pricingPlanId = null;
    /**
     * @var string|null Creation date
     */
    public ?string $createdAt = null;
    /**
     * @var string|null Last update date (data refresh)
     */
    public ?string $at = null;
    /**
     * @var string|null Deletion date
     */
    public ?string $serverDeletedAt = null;
    /**
     * @var bool|null Whether multiple workspaces are enabled
     */
    public ?bool $isMultiWorkspaceEnabled = null;
    /**
     * @var string|null Whether the organization is currently suspended (date)
     */
    public ?string $suspendedAt = null;
    /**
     * @var int|null Number of organization users
     */
    public ?int $userCount = null;
    /**
     * @var TrialInfoEntity|null Trial information
     */
    public ?TrialInfoEntity $trialInfo = null;
    /**
     * @var bool|null Whether the organization is unified
     */
    public ?bool $isUnified = null;
    /**
     * @var int|null Maximum number of workspaces allowed
     */
    public ?int $maxWorkspaces = null;
    /**
     * @var bool|null Whether the requester is an admin of the organization
     */
    public ?bool $admin = null;
    /**
     * @var bool|null Whether the requester is a the owner of the organization
     */
    public ?bool $owner = null;

    protected function setTrialInfo(?array $trialInfo): void
    {
        $this->trialInfo = $this->singleChild($trialInfo ?? [], TrialInfoEntity::class);
    }
}
