<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Workspaces;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Request\Workspaces\ProjectGroupCreateRequest;
use FlyingLama\TogglApi\Entity\Workspace\ProjectGroupEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;
use ReflectionException;

use function implode;

class ProjectGroups extends AbstractApi
{
    /**
     * Get workspace project groups
     *
     * @param int $workspaceId Workspace ID
     * @param int[]|null $projectIds Project IDs
     *
     * @return ProjectGroupEntity[]
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/groups#get-get-workspace-project-groups
     */
    public function list(int $workspaceId, ?array $projectIds = null): array
    {
        $queryParams = [
            'project_ids' => implode(',', $projectIds),
        ];
        $response = $this->requestGet('/workspaces/' . $workspaceId . '/project_groups', $queryParams)->getJson();

        $result = [];
        foreach ($response as $key => $row) {
            $result[$key] = new ProjectGroupEntity($row);
        }

        return $result;
    }

    /**
     * Adds group to project
     *
     * @param int $workspaceId Workspace ID
     * @param ProjectGroupCreateRequest $request
     *
     * @return bool
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/groups#post-adds-group-to-project
     */
    public function create(int $workspaceId, ProjectGroupCreateRequest $request): bool
    {
        $response = $this->requestPost('/workspaces/' . $workspaceId . '/project_groups', $request->toArray());

        return $response->isSuccessful();
    }

    /**
     * Removes group from project
     *
     * @param int $workspaceId Workspace ID
     * @param int $projectGroupId Project group ID
     *
     * @return bool
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/groups#delete-remove-project-group
     */
    public function delete(int $workspaceId, int $projectGroupId): bool
    {
        $response = $this->requestDelete('/workspaces/' . $workspaceId . '/project_groups/' . $projectGroupId);

        return $response->isSuccessful();
    }
}
