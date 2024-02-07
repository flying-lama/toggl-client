<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity;

class TimeEntryEntity extends AbstractEntity
{
    /**
     * @var int|null Time entry ID
     */
    public ?int $id = null;
    /**
     * @var int|null Workspace ID
     */
    public ?int $workspaceId = null;
    /**
     * @var int|null Project ID
     */
    public ?int $projectId = null;
    /**
     * @var int|null Task ID
     */
    public ?int $taskId = null;
    /**
     * @var bool|null Whether the time entry is marked as billable
     */
    public ?bool $billable = null;
    /**
     * @var string|null Start time in UTC
     */
    public ?string $start = null;
    /**
     * @var string|null Stop time in UTC, can be null if it's still running or created with "duration" and "duronly"
     */
    public ?string $stop = null;
    /**
     * @var int|null Time entry duration. For running entries should be negative, preferable -1
     */
    public ?int $duration = null;
    /**
     * @var string|null Description
     */
    public ?string $description = null;
    /**
     * @var string[]|null List of tag names
     */
    public ?array $tags = null;
    /**
     * @var int[]|null List of tag IDs
     */
    public ?array $tagIds = null;
    /**
     * @var bool|null Used to create a TE with a duration but without a stop time, this field is deprecated for GET
     *     endpoints where the value will always be true.
     */
    public ?bool $duronly = null;
    /**
     * @var string|null Last update date (data refresh)
     */
    public ?string $at = null;
    /**
     * @var string|null Deletion date
     */
    public ?string $serverDeletedAt = null;
    /**
     * @var int|null User ID (creator)
     */
    public ?int $userId = null;
    /**
     * @var int|null User ID (creator, legacy field)
     * @deprecated
     */
    public ?int $uid = null;
    /**
     * @var int|null Workspace ID (legacy field)
     * @deprecated
     */
    public ?int $wid = null;
    /**
     * @var int|null Project ID (legacy field)
     */
    public ?int $pid = null;
}
