<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Organizations\Workspaces;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Request\Organizations\WorkspaceUserBulkUpdateRequest;
use FlyingLama\TogglApi\Entity\Workspace\WorkspaceUserEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;
use ReflectionException;

class WorkspaceUsers extends AbstractApi
{
    /**
     * Get list of users belonging to the workspace directly or through at least one group
     *
     * @param int $organizationId Organization ID
     * @param int $workspaceId Workspace ID
     *
     * @return WorkspaceUserEntity
     * @throws ClientException
     * @throws HttpException
     * @see https://developers.track.toggl.com/docs/api/workspaces#get-list-of-users-who-belong-to-the-given-workspace
     */
    public function list(int $organizationId, int $workspaceId): WorkspaceUserEntity
    {
        $url = '/organizations/' . $organizationId . '/workspaces/' . $workspaceId . '/workspace_users';
        $response = $this->requestGet($url);

        return new WorkspaceUserEntity($response);
    }

    /**
     * Changes the users in a workspace
     *
     * @param int $organizationId Organization ID
     * @param int $workspaceId Workspace ID
     * @param WorkspaceUserBulkUpdateRequest $request Parameter
     *
     * @return bool
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/workspaces#patch-changes-the-users-in-a-workspace
     */
    public function bulkUpdate(int $organizationId, int $workspaceId, WorkspaceUserBulkUpdateRequest $request): bool
    {
        $url = '/organizations/' . $organizationId . '/workspaces/' . $workspaceId . '/workspace_users';
        return $this->requestPatch($url, $request->toArray())->isSuccessful();
    }
}
