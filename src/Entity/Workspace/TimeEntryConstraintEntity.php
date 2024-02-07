<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Workspace;

use FlyingLama\TogglApi\Entity\AbstractEntity;

class TimeEntryConstraintEntity extends AbstractEntity
{
    public ?bool $descriptionPresent = null;
    public ?bool $projectPresent = null;
    public ?bool $tagPresent = null;
    public ?bool $taskPresent = null;
    public ?bool $timeEntryConstraintsEnabled = null;
}
