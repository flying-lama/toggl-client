<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Workspaces;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Request\Workspaces\WorkspaceUserUpdateRequest;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;
use ReflectionException;

class WorkspaceUser extends AbstractApi
{
    /**
     * Update a workspace user
     *
     * @param int $workspaceId Workspace ID
     * @param int $workspaceUserId Workspace user ID
     * @param WorkspaceUserUpdateRequest $request Parameter
     *
     * @return bool
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/workspaces#put-update-workspace-user-1
     */
    public function update(int $workspaceId, int $workspaceUserId, WorkspaceUserUpdateRequest $request): bool
    {
        $url = '/workspaces/' . $workspaceId . '/workspace_users/' . $workspaceUserId;

        return $this->requestPut($url, $request->toArray())->isSuccessful();
    }

    /**
     * Removes a workspace user from workspace
     *
     * @param int $workspaceId Workspace ID
     * @param int $workspaceUserId Workspace user ID
     *
     * @return bool
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/workspaces#delete-delete-workspace-user
     */
    public function delete(int $workspaceId, int $workspaceUserId): bool
    {
        $url = '/workspaces/' . $workspaceId . '/workspace_users/' . $workspaceUserId;

        return $this->requestDelete($url)->isSuccessful();
    }
}
