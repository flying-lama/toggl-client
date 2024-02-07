<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Request\Workspaces;

use FlyingLama\TogglApi\Api\Request\AbstractRequest;
use FlyingLama\TogglApi\Util\Caster\Types\CommaSeparatedList;
use FlyingLama\TogglApi\Util\Caster\ValueCaster;

class ProjectListRequest extends AbstractRequest
{
    /**
     * @var bool|null Filter for active/inactive
     */
    public ?bool $active = null;
    /**
     * @var int|null Filter created/modified/deleted since this date using UNIX timestamp
     */
    public ?int $since = null;
    /**
     * @var bool|null Filter billable / not billable
     */
    public ?bool $billable = null;
    /**
     * @var int[]|null Filter User IDs
     */
    #[ValueCaster(CommaSeparatedList::class)]
    public ?array $userIds = null;
    /**
     * @var int[]|null Filter Client IDs
     */
    #[ValueCaster(CommaSeparatedList::class)]
    public ?array $clientIds = null;
    /**
     * @var int[]|null Filter Group IDs
     */
    #[ValueCaster(CommaSeparatedList::class)]
    public ?array $groupIds = null;
    /**
     * @var string|null Filter Name
     */
    public ?string $name = null;
    /**
     * @var int|null Page number
     */
    public ?int $page = null;
    /**
     * @var string|null Sort field
     */
    public ?string $sortField = null;
    /**
     * @var string|null Sort order
     */
    public ?string $sortOrder = null;
    /**
     * @var bool|null Filter only templates
     */
    public ?bool $onlyTemplates = null;
    /**
     * @var int|null Per page
     */
    public ?int $perPage = null;
}
