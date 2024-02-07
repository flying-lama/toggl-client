<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Request\Workspaces;

use FlyingLama\TogglApi\Api\Request\AbstractRequest;

class ClientListRequest extends AbstractRequest
{
    /**
     * @var string|null Name filter
     */
    public ?string $name = null;
    /**
     * @var string|null Status filter
     */
    public ?string $status = null;
}
