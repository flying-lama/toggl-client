<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity;

use FlyingLama\TogglApi\Entity\Project\RecurringParameterEntity;

class ProjectEntity extends AbstractEntity
{
    public const STATUS_UPCOMING = 'upcoming';
    public const STATUS_ACTIVE = 'active';
    public const STATUS_ENDED = 'ended';
    public const STATUS_ARCHIVED = 'archived';
    public const STATUS_DELETED = 'deleted';

    /**
     * @var int|null Project ID
     */
    public ?int $id = null;
    /**
     * @var int|null Workspace ID
     */
    public ?int $workspaceId = null;
    /**
     * @var int|null Client ID
     */
    public ?int $clientId = null;
    /**
     * @var string|null Name
     */
    public ?string $name = null;
    /**
     * @var bool|null Whether the project private
     */
    public ?bool $isPrivate = null;
    /**
     * @var bool|null Whether the project active
     */
    public ?bool $active = null;
    /**
     * @var string|null Last update date (data refresh)
     */
    public ?string $at = null;
    /**
     * @var string|null Creation date
     */
    public ?string $createdAt = null;
    /**
     * @var string|null Deletion date
     */
    public ?string $serverDeletedAt = null;
    /**
     * @var string|null Hex color code
     */
    public ?string $color = null;
    /**
     * @var bool|null Whether the time entry is marked as billable
     */
    public ?bool $billable = null;
    /**
     * @var bool|null Whether the project is used as template, premium feature
     */
    public ?bool $template = null;
    /**
     * @var bool|null Whether estimates are based on task hours, premium feature
     */
    public ?bool $autoEstimates = null;
    /**
     * @var int|null Estimated hours
     */
    public ?int $estimatedHours = null;
    /**
     * @var int|null Estimated seconds
     */
    public ?int $estimatedSeconds = null;
    /**
     * @var string|null Hourly rate
     */
    public ?string $rate = null;
    /**
     * @var string|null Last update of rate
     */
    public ?string $rateLastUpdated = null;
    /**
     * @var string|null Currency
     */
    public ?string $currency = null;
    /**
     * @var bool|null Whether the project is recurring, premium feature
     */
    public ?bool $recurring = null;
    /**
     * @var int|null Template ID
     */
    public ?int $templateId = null;
    /**
     * @var RecurringParameterEntity[] Project recurring parameters, premium feature
     */
    public array $recurringParameters = [];
    /**
     * @var string|null Fixed fee, premium feature
     */
    public ?string $fixedFee = null;
    /**
     * @var int|null Actual hours
     */
    public ?int $actualHours = null;
    /**
     * @var int|null Actual seconds
     */
    public ?int $actualSeconds = null;
    /**
     * @var string|null Start date
     */
    public ?string $startDate = null;
    /**
     * @var string|null Status
     * @see self::STATUS_UPCOMING
     * @see self::STATUS_ACTIVE
     * @see self::STATUS_ENDED
     * @see self::STATUS_ARCHIVED
     * @see self::STATUS_DELETED
     */
    public ?string $status = null;
    /**
     * @var int|null Workspace ID legacy field
     * @deprecated
     */
    public ?int $wid = null;
    /**
     * @var int|null Client ID legacy field
     * @deprecated
     */
    public ?int $cid = null;

    protected function setRecurringParameters(?array $recurringParameters): void
    {
        $this->recurringParameters = $this->multipleChildren(
            $recurringParameters ?? [],
            RecurringParameterEntity::class
        );
    }
}
