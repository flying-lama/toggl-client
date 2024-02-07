<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity;

use FlyingLama\TogglApi\Entity\Workspace\CsvUploadEntity;
use FlyingLama\TogglApi\Entity\Workspace\SubscriptionEntity;

class WorkspaceEntity extends AbstractEntity
{
    /**
     * @var int|null Workspace ID
     */
    public ?int $id = null;
    /**
     * @var int|null Organization ID
     */
    public ?int $organizationId = null;
    /**
     * @var string|null name
     */
    public ?string $name = null;
    /**
     * @var int|null Team member profile
     */
    public ?int $profile = null;
    /**
     * @var bool|null Whether the workspace is premium
     */
    public ?bool $premium = null;
    /**
     * @var bool|null Whether this is a business workspace
     */
    public ?bool $businessWs = null;
    /**
     * @var bool|null Whether is admin
     */
    public ?bool $admin = null;
    /**
     * @var string|null Role name
     */
    public ?string $role = null;
    /**
     * @var string|null Suspension date
     */
    public ?string $suspendedAt = null;
    /**
     * @var string|null Deletion date
     */
    public ?string $serverDeletedAt = null;
    /**
     * @var string|null Default hourly rate, premium feature
     */
    public ?string $defaultHourlyRate = null;
    /**
     * @var string|null Last update of rate
     */
    public ?string $rateLastUpdated;
    /**
     * @var string|null Default currency
     */
    public ?string $defaultCurrency = null;
    /**
     * @var bool|null Only admins will be able to create projects
     */
    public ?bool $onlyAdminsMayCreateProjects = null;
    /**
     * @var bool|null Only admins will be able to create tags
     */
    public ?bool $onlyAdminsMayCreateTags = null;
    /**
     * @var bool|null Whether only admins will be able to see billable rates, premium feature
     */
    public ?bool $onlyAdminsSeeBillableRates = null;
    /**
     * @var bool|null Only admins will be able to see the team dashboard
     */
    public ?bool $onlyAdminsSeeTeamDashboard = null;
    /**
     * @var bool|null Whether projects will be set as billable by default, premium feature
     */
    public ?bool $projectsBillableByDefault = null;
    /**
     * @var string|null Last modification date
     */
    public ?string $lastModified = null;
    /**
     * @var bool|null Whether reports should be collapsed by default
     */
    public ?bool $reportsCollapse = null;
    /**
     * @var int|null Default rounding, premium feature
     */
    public ?int $rounding = null;
    /**
     * @var int|null Default rounding in minutes, premium feature
     */
    public ?int $roundingMinutes = null;
    /**
     * @var string|null Workspace API token
     */
    public ?string $apiToken = null;
    /**
     * @var string|null Last update date (data refresh)
     */
    public ?string $at = null;
    /**
     * @var string|null Logo URL
     */
    public ?string $logoUrl = null;
    /**
     * @var string|null iCal URL for accessing calendar
     */
    public ?string $icalUrl = null;
    /**
     * @var bool|null Whether iCal feature is enabled
     */
    public ?bool $icalEnabled = null;
    /**
     * @var CsvUploadEntity|null CSV upload
     */
    public ?CsvUploadEntity $csvUpload = null;
    /**
     * @var SubscriptionEntity|null Subscription
     */
    public ?SubscriptionEntity $subscription = null;
    /**
     * @var int|null Working hours in minutes
     */
    public ?int $workingHoursInMinutes = null;
}
