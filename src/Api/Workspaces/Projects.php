<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Workspaces;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Request\Workspaces\ProjectBulkUpdateRequest;
use FlyingLama\TogglApi\Api\Request\Workspaces\ProjectCreateRequest;
use FlyingLama\TogglApi\Api\Request\Workspaces\ProjectListRequest;
use FlyingLama\TogglApi\Api\Request\Workspaces\ProjectUpdateRequest;
use FlyingLama\TogglApi\Api\Workspaces\Projects\Tasks;
use FlyingLama\TogglApi\Entity\ProjectEntity;
use FlyingLama\TogglApi\Entity\Workspace\BulkEditResultEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;
use ReflectionException;

use function array_filter;
use function implode;

class Projects extends AbstractApi
{
    public const TIME_ENTRY_DELETION_MODE_DELETE = 'delete';
    public const TIME_ENTRY_DELETION_MODE_UNASSIGN = 'unassign';

    /**
     * Get Projects
     *
     * @param int $workspaceId Workspace ID
     * @param ProjectListRequest|null $listRequest
     *
     * @return ProjectEntity[]
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/projects#get-workspaceprojects
     */
    public function list(int $workspaceId, ?ProjectListRequest $listRequest = null): array
    {
        $queryParams = $listRequest ? $listRequest->toArray() : [];
        $queryParams = array_filter($queryParams);
        $response = $this->requestGet('/workspaces/' . $workspaceId . '/projects', $queryParams)->getJson();

        $result = [];
        foreach ($response as $key => $row) {
            $result[$key] = new ProjectEntity($row);
        }

        return $result;
    }

    /**
     * Create workspace project
     *
     * @param int $workspaceId Workspace ID
     * @param ProjectCreateRequest $request Parameter
     *
     * @return ProjectEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/projects#post-workspaceprojects
     */
    public function create(int $workspaceId, ProjectCreateRequest $request): ProjectEntity
    {
        $response = $this->requestPost('/workspaces/' . $workspaceId . '/projects', $request->toArray())->getJson();

        return new ProjectEntity($response);
    }

    /**
     * Bulk edit workspace projects
     *
     * @param int $workspaceId Workspace ID
     * @param array $projectIds Project IDs
     * @param ProjectBulkUpdateRequest $request Parameter
     *
     * @return BulkEditResultEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/projects#patch-workspaceprojects
     */
    public function bulkUpdate(
        int $workspaceId,
        array $projectIds,
        ProjectBulkUpdateRequest $request
    ): BulkEditResultEntity {
        $url = '/workspaces/' . $workspaceId . '/projects/' . implode(',', $projectIds);
        $response = $this->requestPatch($url, $request->toArray())->getJson();

        return new BulkEditResultEntity($response);
    }

    /**
     * Get workspace project
     *
     * @param int $workspaceId Workspace ID
     * @param int $projectId Project ID
     *
     * @return ProjectEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/projects#get-workspaceproject
     */
    public function get(int $workspaceId, int $projectId): ProjectEntity
    {
        $url = '/workspaces/' . $workspaceId . '/projects/' . $projectId;
        $response = $this->requestGet($url)->getJson();

        return new ProjectEntity($response);
    }

    /**
     * Update workspace project
     *
     * @param int $workspaceId Workspace ID
     * @param int $projectId Project ID
     * @param ProjectUpdateRequest $request
     *
     * @return ProjectEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/projects#put-workspaceproject
     */
    public function update(int $workspaceId, int $projectId, ProjectUpdateRequest $request): ProjectEntity
    {
        $url = '/workspaces/' . $workspaceId . '/projects/' . $projectId;
        $response = $this->requestPut($url, $request->toArray())->getJson();

        return new ProjectEntity($response);
    }

    /**
     * Delete workspace project
     *
     * @param int $workspaceId Workspace ID
     * @param int $projectId Project ID
     * @param string $timeEntryDeletionMode Time entries deletion mode (unassign/delete time entries)
     *
     * @return bool
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see self::TIME_ENTRY_DELETION_MODE_UNASSIGN
     * @see self::TIME_ENTRY_DELETION_MODE_DELETE
     * @see https://developers.track.toggl.com/docs/api/projects#delete-workspaceproject
     */
    public function delete(
        int $workspaceId,
        int $projectId,
        string $timeEntryDeletionMode = self::TIME_ENTRY_DELETION_MODE_UNASSIGN
    ): bool {
        $queryParams = ['teDeletionMode' => $timeEntryDeletionMode];
        $url = '/workspaces/' . $workspaceId . '/projects/' . $projectId;

        return $this->requestDelete($url, $queryParams)->isSuccessful();
    }

    public function tasks(): Tasks
    {
        return new Tasks($this->getClient());
    }
}
