<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Workspace;

use FlyingLama\TogglApi\Entity\AbstractListEntity;
use FlyingLama\TogglApi\Entity\TaskEntity;

class TaskListEntity extends AbstractListEntity
{
    /**
     * @var TaskEntity[]|null Task list
     */
    public ?array $data = null;

    public function setData(?array $data = null): void
    {
        $this->data = $this->multipleChildren($data, TaskEntity::class);
    }
}
