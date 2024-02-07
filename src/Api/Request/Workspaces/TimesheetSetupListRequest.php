<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Request\Workspaces;

use FlyingLama\TogglApi\Api\Request\AbstractRequest;
use FlyingLama\TogglApi\Util\Caster\Types\CommaSeparatedList;
use FlyingLama\TogglApi\Util\Caster\ValueCaster;

class TimesheetSetupListRequest extends AbstractRequest
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
     * @var string|null
     */
    public ?string $sortField = null;
    /**
     * @var string|null
     */
    public ?string $sortOrder = null;
}
