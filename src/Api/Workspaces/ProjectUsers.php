<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Workspaces;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Request\Workspaces\ProjectUserBulkUpdateRequest;
use FlyingLama\TogglApi\Api\Request\Workspaces\ProjectUserCreateRequest;
use FlyingLama\TogglApi\Api\Request\Workspaces\ProjectUserUpdateRequest;
use FlyingLama\TogglApi\Entity\Workspace\BulkEditResultEntity;
use FlyingLama\TogglApi\Entity\Workspace\ProjectUserEntity;
use FlyingLama\TogglApi\Entity\Workspace\WorkspaceUserEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;
use ReflectionException;

use function implode;

class ProjectUsers extends AbstractApi
{
    public const WITH_GROUP_MEMBERS = 'with_group_members';
    public const WITHOUT_GROUP_MEMBERS = 'without_group_members';

    /**
     * Get workspace project users
     *
     * @param int $workspaceId Workspace ID
     * @param int[]|null $projectIds Project IDs
     *
     * @return ProjectUserEntity[]
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/projects#get-get-workspace-projects-users
     */
    public function list(
        int $workspaceId,
        ?array $projectIds = null,
        string $groupMemberMode = self::WITHOUT_GROUP_MEMBERS
    ): array {
        $queryParams = [
            'project_ids' => implode(',', $projectIds),
            'with_group_members' => $groupMemberMode === self::WITH_GROUP_MEMBERS,
        ];
        $response = $this->requestGet('/workspaces/' . $workspaceId . '/project_users', $queryParams)->getJson();

        $result = [];
        foreach ($response as $key => $row) {
            $result[$key] = new ProjectUserEntity($row);
        }

        return $result;
    }

    /**
     * Adds user to workspace project
     *
     * @param int $workspaceId Workspace ID
     * @param ProjectUserCreateRequest $request
     *
     * @return ProjectUserEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/projects#post-add-an-user-into-workspace-projects-users
     */
    public function create(int $workspaceId, ProjectUserCreateRequest $request): ProjectUserEntity
    {
        $url = '/workspaces/' . $workspaceId . '/project_users';
        $response = $this->requestPost($url, $request->toArray())->getJson();

        return new ProjectUserEntity($response);
    }

    /**
     * Bulk edit workspace project users
     *
     * @param int $workspaceId Workspace ID
     * @param int[] $projectUserIds Project user IDs
     * @param ProjectUserBulkUpdateRequest $request
     *
     * @return BulkEditResultEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/projects#patch-patch-project-users-from-workspace
     */
    public function bulkUpdate(
        int $workspaceId,
        array $projectUserIds,
        ProjectUserBulkUpdateRequest $request
    ): BulkEditResultEntity {
        $url = '/workspaces/' . $workspaceId . '/project_users/' . implode(',', $projectUserIds);
        $response = $this->requestPatch($url, $request->toArray())->getJson();

        return new BulkEditResultEntity($response);
    }

    /**
     * Update workspace project user
     *
     * @param int $workspaceId Workspace ID
     * @param int $projectUserId Project user ID
     * @param ProjectUserUpdateRequest $request
     *
     * @return WorkspaceUserEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/projects#put-update-an-user-into-workspace-projects-users
     */
    public function update(int $workspaceId, int $projectUserId, ProjectUserUpdateRequest $request): WorkspaceUserEntity
    {
        $url = '/workspaces/' . $workspaceId . '/project_users/' . $projectUserId;
        $response = $this->requestPut($url, $request->toArray())->getJson();

        return new WorkspaceUserEntity($response);
    }

    /**
     * Removes user from workspace project
     *
     * @param int $workspaceId Workspace ID
     * @param int $projectUserId Project user ID
     *
     * @return bool
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/projects#delete-delete-a-project-user-from-workspace-projects-users
     */
    public function delete(int $workspaceId, int $projectUserId): bool
    {
        $response = $this->requestDelete('/workspaces/' . $workspaceId . '/project_users/' . $projectUserId);

        return $response->isSuccessful();
    }
}
