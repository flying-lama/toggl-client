<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Organizations\Workspaces;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Request\Organizations\WorkspaceAssignmentUpdateRequest;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;
use ReflectionException;

class Assignments extends AbstractApi
{
    /**
     * Change assignments of users within a workspace
     *
     * @param int $organizationId Organization ID
     * @param int $workspaceId Workspace ID
     * @param WorkspaceAssignmentUpdateRequest $request Parameter
     *
     * @return bool
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/organizations#put-change-assignments-of-users-within-a-workspace
     */
    public function update(int $organizationId, int $workspaceId, WorkspaceAssignmentUpdateRequest $request): bool
    {
        $url = '/organizations/' . $organizationId . '/workspaces/' . $workspaceId . '/assignments';

        return $this->requestPut($url, $request->toArray())->isSuccessful();
    }
}
