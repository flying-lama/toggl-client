<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity;

class TaskEntity extends AbstractEntity
{
    /**
     * @var int|null Task ID
     */
    public ?int $id = null;
    /**
     * @var string|null Name
     */
    public ?string $name = null;
    /**
     * @var bool|null False when the task has been done
     */
    public ?bool $active = null;
    /**
     * @var string|null Last update date (data refresh)
     */
    public ?string $at = null;
    /**
     * @var int|null Estimated seconds
     */
    public ?int $estimatedSeconds = null;
    /**
     * @var int|null Project ID
     */
    public ?int $projectId = null;
    /**
     * @var bool|null Whether this is a recurring task
     */
    public ?bool $recurring = null;
    /**
     * @var string|null Deletion date
     */
    public ?string $serverDeletedAt = null;
    /**
     * @var int|null Attention: trackedSeconds is in milliseconds, not in seconds
     */
    public ?int $trackedSeconds = null;
    /**
     * @var int|null Assigned user ID
     */
    public ?int $userId = null;
    /**
     * @var int|null Workspace ID
     */
    public ?int $workspaceId = null;
}
