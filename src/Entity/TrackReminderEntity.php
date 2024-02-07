<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity;

class TrackReminderEntity extends AbstractEntity
{
    /**
     * @var int|null Reminder ID
     */
    public ?int $reminderId = null;
    /**
     * @var int|null Frequency of the reminder in days, should be either 1 or 7
     */
    public ?int $frequency = null;
    /**
     * @var int|null Threshold is the number of hours after which the reminder will be sent
     */
    public ?int $threshold = null;
    /**
     * @var string|null Creation date
     */
    public ?string $createdAt = null;
    /**
     * @var int|null Workspace ID
     */
    public ?int $workspaceId = null;
    /**
     * @var array|null Groups IDs to send the reminder to
     */
    public ?array $groupIds = null;
    /**
     * @var array|null User IDs to send the reminder to
     */
    public ?array $userIds = null;
}
