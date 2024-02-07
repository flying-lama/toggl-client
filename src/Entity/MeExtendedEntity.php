<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity;

class MeExtendedEntity extends MeEntity
{
    /**
     * @var ClientEntity[] List of clients
     */
    public array $clients = [];
    /**
     * @var TimeEntryEntity[] List of time entries
     */
    public array $timeEntries = [];
    /**
     * @var ProjectEntity[] List of projects
     */
    public array $projects;
    /**
     * @var WorkspaceEntity[] List of workspaces
     */
    public array $workspaces = [];

    protected function setClients(?array $clients): void
    {
        $this->clients = $this->multipleChildren($clients ?? [], ClientEntity::class);
    }

    protected function setTimeEntries(?array $timeEntries): void
    {
        $this->timeEntries = $this->multipleChildren($timeEntries ?? [], TimeEntryEntity::class);
    }

    protected function setProjects(?array $projects): void
    {
        $this->projects = $this->multipleChildren($projects ?? [], ProjectEntity::class);
    }

    protected function setWorkspaces(?array $workspaces): void
    {
        $this->workspaces = $this->multipleChildren($workspaces ?? [], WorkspaceEntity::class);
    }
}
