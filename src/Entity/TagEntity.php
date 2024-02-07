<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity;

class TagEntity extends AbstractEntity
{
    /**
     * @var int|null Tag ID
     */
    public ?int $id = null;

    /**
     * @var string|null Name
     */
    public ?string $name = null;

    /**
     * @var int|null Workspace ID
     */
    public ?int $workspaceId = null;
    /**
     * @var string|null Last update date (data refresh)
     */
    public ?string $at = null;

    /**
     * @var string|null Deletion date
     */
    public ?string $deletedAt = null;
}
