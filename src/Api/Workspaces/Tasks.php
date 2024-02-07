<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Workspaces;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Request\Workspaces\TaskListRequest;
use FlyingLama\TogglApi\Entity\Workspace\TaskListEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;
use ReflectionException;

use function array_filter;

class Tasks extends AbstractApi
{
    /**
     * Get Tasks
     *
     * @param int $workspaceId Workspace ID
     * @param TaskListRequest|null $listRequest
     *
     * @return TaskListEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/tasks#get-tasks
     */
    public function list(int $workspaceId, ?TaskListRequest $listRequest = null): TaskListEntity
    {
        $queryParams = $listRequest ? $listRequest->toArray() : [];
        $queryParams = array_filter($queryParams);
        $response = $this->requestGet('/workspaces/' . $workspaceId . '/tasks', $queryParams)->getJson();

        return new TaskListEntity($response);
    }
}
