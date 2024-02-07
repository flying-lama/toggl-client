<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Organizations;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Request\Organizations\GroupCreateRequest;
use FlyingLama\TogglApi\Api\Request\Organizations\GroupPatchRequest;
use FlyingLama\TogglApi\Api\Request\Organizations\GroupUpdateRequest;
use FlyingLama\TogglApi\Entity\GroupEntity;
use FlyingLama\TogglApi\Entity\Organization\Groups\PatchResultEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;
use ReflectionException;

class Groups extends AbstractApi
{
    /**
     * Get list of groups in organization with user and workspace assignments
     *
     * @param int $organizationId Organization ID
     * @param string|null $name Filter name
     * @param string|null $workspaceId Filter workspace ID
     *
     * @return GroupEntity[]
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/groups#get-list-of-groups-in-organization-with-user-and-workspace-assignments
     */
    public function list(int $organizationId, ?string $name = null, ?string $workspaceId = null): array
    {
        $queryParams = [
            'name' => $name,
            'workspace' => $workspaceId,
        ];
        $queryParams = array_filter($queryParams);
        $response = $this->requestGet('/organizations/' . $organizationId . '/groups', $queryParams)->getJson();

        $result = [];
        foreach ($response as $key => $row) {
            $result[$key] = new GroupEntity($row);
        }

        return $result;
    }

    /**
     * Create group
     *
     * @param int $organizationId Organization ID
     * @param GroupCreateRequest $request Parameter
     *
     * @return GroupEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/groups#post-create-group
     */
    public function create(int $organizationId, GroupCreateRequest $request): GroupEntity
    {
        $response = $this->requestPost('/organizations/' . $organizationId . '/groups', $request->toArray())->getJson();

        return new GroupEntity($response);
    }

    /**
     * Edit group
     *
     * @param int $organizationId Organization ID
     * @param int $groupId Group ID
     * @param GroupUpdateRequest $request Parameter
     *
     * @return GroupEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/groups#put-edit-group
     */
    public function update(int $organizationId, int $groupId, GroupUpdateRequest $request): GroupEntity
    {
        $response = $this->requestPut(
            '/organizations/' . $organizationId . '/groups/' . $groupId,
            $request->toArray()
        )->getJson();

        return new GroupEntity($response);
    }

    /**
     * Deletes group
     *
     * @param int $organizationId Organization ID
     * @param int $groupId Group ID
     *
     * @return bool
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/groups#delete-deletes-group
     */
    public function delete(int $organizationId, int $groupId): bool
    {
        return $this->requestDelete('/organizations/' . $organizationId . '/groups/' . $groupId)->isSuccessful();
    }

    /**
     * Patch group
     *
     * @param int $organizationId Organization ID
     * @param int $groupId Group ID
     * @param GroupPatchRequest $request Parameter
     *
     * @return PatchResultEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/groups#patch-patch-group
     */
    public function patch(int $organizationId, int $groupId, GroupPatchRequest $request): PatchResultEntity
    {
        $url = '/organizations/' . $organizationId . '/groups/' . $groupId;
        $response = $this->requestPatch($url, $request->toArray())->getJson();

        return new PatchResultEntity($response);
    }
}
