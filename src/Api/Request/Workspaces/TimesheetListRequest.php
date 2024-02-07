<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Request\Workspaces;

use FlyingLama\TogglApi\Api\Request\AbstractRequest;
use FlyingLama\TogglApi\Util\Caster\Types\CommaSeparatedList;
use FlyingLama\TogglApi\Util\Caster\ValueCaster;

class TimesheetListRequest extends AbstractRequest
{
    /**
     * @var int[]|null
     */
    #[ValueCaster(CommaSeparatedList::class)]
    public ?array $memberIds = null;
    /**
     * @var int[]|null
     */
    #[ValueCaster(CommaSeparatedList::class)]
    public ?array $approverIds = null;
    /**
     * @var int[]|null
     */
    #[ValueCaster(CommaSeparatedList::class)]
    public ?array $timesheetSetupIds = null;
    /**
     * @var int[]|null
     */
    #[ValueCaster(CommaSeparatedList::class)]
    public ?array $statuses = null;
    /**
     * @var string|null
     */
    public ?string $before = null;
    /**
     * @var string|null
     */
    public ?string $after = null;
    /**
     * @var int|null
     */
    public ?int $page = null;
    /**
     * @var int|null
     */
    public ?int $perPage = null;
    /**
     * @var string|null
     */
    public ?string $sortField = null;
    /**
     * @var string|null
     */
    public ?string $sortOrder = null;
}
