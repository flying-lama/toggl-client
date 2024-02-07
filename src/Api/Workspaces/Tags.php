<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Workspaces;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Request\Workspaces\TagCreateRequest;
use FlyingLama\TogglApi\Api\Request\Workspaces\TagUpdateRequest;
use FlyingLama\TogglApi\Entity\TagEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;
use ReflectionException;

class Tags extends AbstractApi
{
    /**
     * Get Tags
     *
     * @param int $workspaceId Workspace ID
     *
     * @return TagEntity[]
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/tags#get-tags
     */
    public function list(int $workspaceId): array
    {
        $response = $this->requestGet('/workspaces/' . $workspaceId . '/tags')->getJson();

        $result = [];
        foreach ($response as $key => $row) {
            $result[$key] = new TagEntity($row);
        }

        return $result;
    }

    /**
     * Create workspace tag
     *
     * @param int $workspaceId Workspace ID
     * @param TagCreateRequest $request Parameter
     *
     * @return TagEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/tags#post-create-tag
     */
    public function create(int $workspaceId, TagCreateRequest $request): TagEntity
    {
        $response = $this->requestPost('/workspaces/' . $workspaceId . '/tags', $request->toArray())->getJson();

        return new TagEntity($response);
    }

    /**
     * Update workspace tag
     *
     * @param int $workspaceId Workspace ID
     * @param int $tagId Tag ID
     * @param TagUpdateRequest $request Parameter
     *
     * @return TagEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/tags#put-update-tag
     */
    public function update(int $workspaceId, int $tagId, TagUpdateRequest $request): TagEntity
    {
        $url = '/workspaces/' . $workspaceId . '/tags/' . $tagId;
        $response = $this->requestPut($url, $request->toArray())->getJson();

        return new TagEntity($response);
    }

    /**
     * Delete workspace tag
     *
     * @param int $workspaceId Workspace ID
     * @param int $tagId Tag ID
     *
     * @return bool
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/tags#delete-delete-tag
     */
    public function delete(int $workspaceId, int $tagId): bool
    {
        $url = '/workspaces/' . $workspaceId . '/tags/' . $tagId;

        return $this->requestDelete($url)->isSuccessful();
    }
}
