<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Workspace;

use FlyingLama\TogglApi\Entity\AbstractListEntity;

class TimesheetListEntity extends AbstractListEntity
{
    /**
     * @var TimesheetEntity[]|null
     */
    public ?array $data = null;

    public function setData(?array $data): void
    {
        $this->data = $this->multipleChildren($data, TimesheetEntity::class);
    }
}
