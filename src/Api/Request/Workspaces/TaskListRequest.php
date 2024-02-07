<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Request\Workspaces;

use FlyingLama\TogglApi\Api\Request\AbstractRequest;

class TaskListRequest extends AbstractRequest
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
     * @var int|null Per page
     */
    public ?int $perPage = null;
    /**
     * @var int|null Filter Project ID
     */
    public ?int $pid = null;
    /**
     * @var string|null Filter smallest boundary date in the format YYYY-MM-DD
     */
    public ?string $startDate = null;
    /**
     * @var string|null Filter biggest boundary date in the format YYYY-MM-DD
     */
    public ?string $endDate = null;
}
