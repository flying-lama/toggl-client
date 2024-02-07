<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Workspaces\Projects;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Request\Workspaces\TaskBulkUpdateRequest;
use FlyingLama\TogglApi\Api\Request\Workspaces\TaskCreateRequest;
use FlyingLama\TogglApi\Api\Request\Workspaces\TaskUpdateRequest;
use FlyingLama\TogglApi\Entity\TaskEntity;
use FlyingLama\TogglApi\Entity\Workspace\BulkEditResultEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;
use ReflectionException;

use function implode;

class Tasks extends AbstractApi
{
    /**
     * Get Project tasks
     *
     * @param int $workspaceId Workspace ID
     * @param int $projectId Project ID
     *
     * @return TaskEntity[]
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/tasks#get-workspaceprojecttasks
     */
    public function list(int $workspaceId, int $projectId): array
    {
        $url = '/workspaces/' . $workspaceId . '/projects/' . $projectId . '/tasks';
        $response = $this->requestGet($url)->getJson();

        $result = [];
        foreach ($response as $key => $row) {
            $result[$key] = new TaskEntity($row);
        }

        return $result;
    }

    /**
     * Create workspace project task
     *
     * @param int $workspaceId Workspace ID
     * @param int $projectId Project ID
     * @param TaskCreateRequest $request Parameter
     *
     * @return TaskEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/tasks#post-workspaceprojecttasks
     */
    public function create(int $workspaceId, int $projectId, TaskCreateRequest $request): TaskEntity
    {
        $url = '/workspaces/' . $workspaceId . '/projects/' . $projectId . '/tasks';
        $response = $this->requestPost($url, $request->toArray())->getJson();

        return new TaskEntity($response);
    }

    /**
     * Bulk edit workspace project tasks
     *
     * @param int $workspaceId Workspace ID
     * @param int $projectId Project ID
     * @param int[] $taskIds Task IDs
     * @param TaskBulkUpdateRequest $request
     *
     * @return BulkEditResultEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/tasks#patch-workspaceprojecttasks
     */
    public function bulkUpdate(
        int $workspaceId,
        int $projectId,
        array $taskIds,
        TaskBulkUpdateRequest $request
    ): BulkEditResultEntity {
        $url = '/workspaces/' . $workspaceId . '/projects/' . $projectId . '/tasks/' . implode(',', $taskIds);
        $response = $this->requestPatch($url, $request->toArray())->getJson();

        return new BulkEditResultEntity($response);
    }

    /**
     * Get workspace project task
     *
     * @param int $workspaceId Workspace ID
     * @param int $projectId Project ID
     * @param int $taskId Task ID
     *
     * @return TaskEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/tasks#get-workspaceprojecttask
     */
    public function get(int $workspaceId, int $projectId, int $taskId): TaskEntity
    {
        $url = '/workspaces/' . $workspaceId . '/projects/' . $projectId . '/tasks/' . $taskId;
        $response = $this->requestGet($url)->getJson();

        return new TaskEntity($response);
    }

    /**
     * Update workspace project task
     *
     * @param int $workspaceId Workspace ID
     * @param int $projectId Project ID
     * @param int $taskId Task ID
     * @param TaskUpdateRequest $request
     *
     * @return TaskEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/tasks#put-workspaceprojecttask
     */
    public function update(int $workspaceId, int $projectId, int $taskId, TaskUpdateRequest $request): TaskEntity
    {
        $url = '/workspaces/' . $workspaceId . '/projects/' . $projectId . '/tasks/' . $taskId;
        $response = $this->requestPut($url, $request->toArray())->getJson();

        return new TaskEntity($response);
    }

    /**
     * Delete workspace project task
     *
     * @param int $workspaceId Workspace ID
     * @param int $projectId Project ID
     * @param int $taskId Task ID
     *
     * @return bool
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/tasks#delete-workspaceprojecttask
     */
    public function delete(int $workspaceId, int $projectId, int $taskId): bool
    {
        $url = '/workspaces/' . $workspaceId . '/projects/' . $projectId . '/tasks/' . $taskId;

        return $this->requestDelete($url)->isSuccessful();
    }
}
