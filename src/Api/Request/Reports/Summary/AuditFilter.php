<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Request\Reports\Summary;

use FlyingLama\TogglApi\Api\Request\AbstractRequest;

class AuditFilter extends AbstractRequest
{
    /**
     * @var GroupFilter|null Group filter
     */
    public ?GroupFilter $groupFilter = null;
    /**
     * @var bool|null Whether empty groups should be displayed, default false, premium feature
     */
    public ?bool $showEmptyGroups = null;
    /**
     * @var bool|null Whether tacked groups should be displayed, default true, premium feature
     */
    public ?bool $showTrackedGroups = null;
}
