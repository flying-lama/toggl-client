<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Workspace;

use FlyingLama\TogglApi\Entity\AbstractEntity;

class TimesheetSetupListEntity extends AbstractEntity
{
    /**
     * @var TimesheetSetupEntity[]|null Timesheet setups
     */
    public ?array $data = null;

    public function setData(?array $data): void
    {
        $this->data = $this->multipleChildren($data, TimesheetSetupEntity::class);
    }
}
