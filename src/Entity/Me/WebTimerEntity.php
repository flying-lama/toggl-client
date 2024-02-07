<?php

namespace FlyingLama\TogglApi\Entity\Me;

use FlyingLama\TogglApi\Entity\AbstractEntity;
use FlyingLama\TogglApi\Entity\ClientEntity;
use FlyingLama\TogglApi\Entity\ProjectEntity;
use FlyingLama\TogglApi\Entity\TagEntity;
use FlyingLama\TogglApi\Entity\TaskEntity;
use FlyingLama\TogglApi\Entity\TimeEntryEntity;

class WebTimerEntity extends AbstractEntity
{
    /**
     * @var array|null Time entries
     */
    public ?array $timeEntries = null;
    /**
     * @var array|null Projects
     */
    public ?array $projects = null;
    /**
     * @var array|null Tasks
     */
    public ?array $tasks = null;
    /**
     * @var array|null Clients
     */
    public ?array $clients = null;
    /**
     * @var array|null Tags
     */
    public ?array $tags = null;

    protected function setTimeEntries(?array $rows): void
    {
        $this->timeEntries = $this->multipleChildren($rows ?? [], TimeEntryEntity::class);
    }

    protected function setProjects(?array $rows): void
    {
        $this->projects = $this->multipleChildren($rows ?? [], ProjectEntity::class);
    }

    protected function setTasks(?array $rows): void
    {
        $this->tasks = $this->multipleChildren($rows ?? [], TaskEntity::class);
    }

    protected function setClients(?array $rows): void
    {
        $this->clients = $this->multipleChildren($rows ?? [], ClientEntity::class);
    }

    protected function setTags(?array $rows): void
    {
        $this->tags = $this->multipleChildren($rows ?? [], TagEntity::class);
    }
}
