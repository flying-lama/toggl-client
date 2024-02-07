<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity;

class MeEntity extends AbstractEntity
{
    /**
     * @var int|null User ID
     */
    public ?int $id = null;
    /**
     * @var string|null API token
     */
    public ?string $apiToken = null;
    /**
     * @var string|null Email address
     */
    public ?string $email = null;
    /**
     * @var string|null Full name
     */
    public ?string $fullname = null;
    /**
     * @var string|null Timezone (e.g. Europe/Berlin)
     */
    public ?string $timezone = null;
    /**
     * @var string|null Toggl accounts ID
     */
    public ?string $togglAccountsId = null;
    /**
     * @var int|null Default workspace ID
     */
    public ?int $defaultWorkspaceId = null;
    /**
     * @var int|null First day of the week. Sunday: 0, Monday:1, etc.
     */
    public ?int $beginningOfWeek = null;
    /**
     * @var string|null Image url (e.g. Gravatar)
     */
    public ?string $imageUrl = null;
    /**
     * @var string|null Creation date
     */
    public ?string $createdAt = null;
    /**
     * @var string|null Last update date
     */
    public ?string $updatedAt = null;
    /**
     * @var string|null Open ID email
     */
    public ?string $openidEmail = null;
    /**
     * @var bool|null Whether single sign-on (SSO / Open ID) is enabled
     */
    public ?bool $openidEnabled = null;
    /**
     * @var int|null Country ID
     */
    public ?int $countryId = null;
    /**
     * @var bool|null Whether the user is able to authenticate with a password
     */
    public ?bool $hasPassword = null;
    /**
     * @var string|null Last update date (data refresh)
     */
    public ?string $at = null;
    /**
     * @var string|null Intercom Identify Verification hash
     */
    public ?string $intercomHash = null;
    /**
     * @var string[]|null List of active OAuth providers
     */
    public ?array $oauthProviders = [];
    /**
     * @var array<string, mixed>|null Options
     */
    public ?array $options = [];
}
