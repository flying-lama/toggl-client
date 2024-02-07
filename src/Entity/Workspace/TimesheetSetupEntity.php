<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Workspace;

use FlyingLama\TogglApi\Entity\AbstractEntity;

class TimesheetSetupEntity extends AbstractEntity
{
    /**
     * @var int|null Approver user ID
     */
    public ?int $approverId = null;
    /**
     * @var string|null Approver user name
     */
    public ?string $approverName = null;
    /**
     * @var string|null Start date
     */
    public ?string $startDate = null;
    /**
     * @var string|null End date
     */
    public ?string $endDate = null;
    /**
     * @var ErrorEntity[]|null Errors
     */
    public ?array $errors = null;
    /**
     * @var int|null Member ID
     */
    public ?int $memberId = null;
    /**
     * @var string|null Member name
     */
    public ?string $memberName = null;
    /**
     * @var string|null Periodicity
     */
    public ?string $periodicity = null;
    /**
     * @var string|null Reminder day
     */
    public ?string $reminderDay = null;
    /**
     * @var string|null Reminder time
     */
    public ?string $reminderTime = null;
    /**
     * @var int|null Workspace ID
     */
    public ?int $workspaceId = null;
}
