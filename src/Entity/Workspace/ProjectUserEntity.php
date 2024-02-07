<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Workspace;

use FlyingLama\TogglApi\Entity\AbstractEntity;

class ProjectUserEntity extends AbstractEntity
{
    /**
     * @var int|null Project user ID
     */
    public ?int $id = null;
    /**
     * @var int|null Project ID
     */
    public ?int $projectId = null;
    /**
     * @var int|null User ID
     */
    public ?int $userId = null;
    /**
     * @var int|null Workspace ID
     */
    public ?int $workspaceId = null;
    /**
     * @var bool|null Whether the user is manager of the project
     */
    public ?bool $manager = null;
    /**
     * @var mixed|null Custom rate for project user
     */
    public mixed $rate = null;
    /**
     * @var string|null Last update of rate
     */
    public ?string $rateLastUpdated = null;
    /**
     * @var string|null Last update date (data refresh)
     */
    public ?string $at = null;
    /**
     * @var int|null Group ID
     */
    public ?int $groupId = null;
    /**
     * @var int|null Group ID, legacy field
     */
    public ?int $gid = null;
    /**
     * @var int|null Labour cost for this project user
     */
    public ?int $labourCost = null;
}
