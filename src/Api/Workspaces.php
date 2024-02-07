<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api;

use FlyingLama\TogglApi\Api\Request\WorkspaceCreateRequest;
use FlyingLama\TogglApi\Api\Request\WorkspaceUpdateRequest;
use FlyingLama\TogglApi\Api\Workspaces\Clients;
use FlyingLama\TogglApi\Api\Workspaces\ProjectGroups;
use FlyingLama\TogglApi\Api\Workspaces\Projects;
use FlyingLama\TogglApi\Api\Workspaces\ProjectUsers;
use FlyingLama\TogglApi\Api\Workspaces\Search;
use FlyingLama\TogglApi\Api\Workspaces\Statistics;
use FlyingLama\TogglApi\Api\Workspaces\Tags;
use FlyingLama\TogglApi\Api\Workspaces\Tasks;
use FlyingLama\TogglApi\Api\Workspaces\TimeEntries;
use FlyingLama\TogglApi\Api\Workspaces\TimeEntryConstraints;
use FlyingLama\TogglApi\Api\Workspaces\Timesheets;
use FlyingLama\TogglApi\Api\Workspaces\TimesheetSetups;
use FlyingLama\TogglApi\Api\Workspaces\TrackReminders;
use FlyingLama\TogglApi\Api\Workspaces\Users;
use FlyingLama\TogglApi\Api\Workspaces\WorkspaceUser;
use FlyingLama\TogglApi\Entity\WorkspaceEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;
use ReflectionException;

class Workspaces extends AbstractApi
{
    public function timeEntries(): TimeEntries
    {
        return new TimeEntries($this->getClient());
    }

    public function projectGroups(): ProjectGroups
    {
        return new ProjectGroups($this->getClient());
    }

    public function statistics(): Statistics
    {
        return new Statistics($this->getClient());
    }

    public function timeEntryConstraints(): TimeEntryConstraints
    {
        return new TimeEntryConstraints($this->getClient());
    }

    public function trackReminders(): TrackReminders
    {
        return new TrackReminders($this->getClient());
    }

    public function users(): Users
    {
        return new Users($this->getClient());
    }

    public function workspaceUser(): WorkspaceUser
    {
        return new WorkspaceUser($this->getClient());
    }

    public function clients(): Clients
    {
        return new Clients($this->getClient());
    }

    public function projects(): Projects
    {
        return new Projects($this->getClient());
    }

    public function projectUsers(): ProjectUsers
    {
        return new ProjectUsers($this->getClient());
    }

    public function tasks(): Tasks
    {
        return new Tasks($this->getClient());
    }

    public function tags(): Tags
    {
        return new Tags($this->getClient());
    }

    public function timesheetSetups(): TimesheetSetups
    {
        return new TimesheetSetups($this->getClient());
    }

    public function timesheets(): Timesheets
    {
        return new Timesheets($this->getClient());
    }

    public function search(): Search
    {
        return new Search($this->getClient());
    }

    /**
     * Get a Workspace
     *
     * @param int $workspaceId Workspace ID
     *
     * @return WorkspaceEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/workspaces#get-get-single-workspace
     */
    public function get(int $workspaceId): WorkspaceEntity
    {
        $response = $this->requestGet('/workspaces/' . $workspaceId)->getJson();

        return new WorkspaceEntity($response);
    }

    /**
     * Create a workspace
     *
     * @param WorkspaceCreateRequest $request Parameter
     *
     * @return WorkspaceEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/workspaces#post-create-a-new-workspace
     */
    public function create(WorkspaceCreateRequest $request): WorkspaceEntity
    {
        $response = $this->requestPost('/workspaces', $request->toArray())->getJson();

        return new WorkspaceEntity($response);
    }

    /**
     * Update a specific workspace
     *
     * @param int $workspaceId Workspace ID
     * @param WorkspaceUpdateRequest $request
     *
     * @return WorkspaceEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/workspaces#put-update-workspace
     */
    public function update(int $workspaceId, WorkspaceUpdateRequest $request): WorkspaceEntity
    {
        $response = $this->requestPut('/workspaces/' . $workspaceId, $request->toArray())->getJson();

        return new WorkspaceEntity($response);
    }
}
