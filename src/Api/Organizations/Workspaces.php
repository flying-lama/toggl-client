<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Organizations;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Organizations\Workspaces\Assignments;
use FlyingLama\TogglApi\Api\Organizations\Workspaces\Statistics;
use FlyingLama\TogglApi\Api\Organizations\Workspaces\WorkspaceUsers;
use FlyingLama\TogglApi\Api\Request\Organizations\WorkspaceCreateRequest;
use FlyingLama\TogglApi\Entity\WorkspaceEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;
use ReflectionException;

class Workspaces extends AbstractApi
{
    public function statistics(): Statistics
    {
        return new Statistics($this->getClient());
    }

    public function assignments(): Assignments
    {
        return new Assignments($this->getClient());
    }

    public function workspaceUsers(): WorkspaceUsers
    {
        return new WorkspaceUsers($this->getClient());
    }

    /**
     * Create a Workspace within an existing organization
     *
     * @param int $organizationId
     * @param WorkspaceCreateRequest $request
     *
     * @return WorkspaceEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/workspaces#post-create-a-new-workspace
     */
    public function create(int $organizationId, WorkspaceCreateRequest $request): WorkspaceEntity
    {
        $response = $this->requestPost(
            '/organizations/' . $organizationId . '/workspaces',
            $request->toArray()
        )->getJson();

        return new WorkspaceEntity($response);
    }
}
