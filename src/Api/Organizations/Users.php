<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Organizations;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Organizations\Users\Leave;
use FlyingLama\TogglApi\Api\Organizations\Users\User;
use FlyingLama\TogglApi\Api\Request\Organizations\UserBulkUpdateRequest;
use FlyingLama\TogglApi\Api\Request\Organizations\UserUpdateRequest;
use FlyingLama\TogglApi\Entity\UserEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;
use ReflectionException;

use function array_filter;
use function implode;

class Users extends AbstractApi
{
    /**
     * Get list of users in organization
     *
     * @param int $organizationId Organization ID
     * @param string|null $filter Filter string for name or email
     * @param string[]|null $activeStatus Filter for status
     * @param bool|null $onlyAdmins Filter for admin
     * @param int[]|null $groups Filter for group (IDs)
     * @param int[]|null $workspaces Filter for workspace (ID)
     * @param int|null $page Page number
     * @param int|null $perPage Number of items per page (default: 50)
     * @param string|null $sortDir Sort direction (Default: asc)
     *
     * @return UserEntity[]
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/organizations#get-list-of-users-in-organization
     */
    public function list(
        int $organizationId,
        ?string $filter = null,
        ?array $activeStatus = null,
        ?bool $onlyAdmins = null,
        ?array $groups = null,
        ?array $workspaces = null,
        ?int $page = null,
        ?int $perPage = null,
        ?string $sortDir = null,
    ): array {
        $queryParams = [
            'filter' => $filter,
            'active_status' => implode(',', $activeStatus),
            'only_admins' => $onlyAdmins,
            'groups' => implode(',', $groups),
            'workspaces' => implode(',', $workspaces),
            'page' => $page,
            'perPage' => $perPage,
            'sortDir' => $sortDir,
        ];
        $queryParams = array_filter($queryParams);

        $response = $this->requestGet('/organizations/' . $organizationId . '/users', $queryParams)->getJson();

        $result = [];
        foreach ($response as $key => $row) {
            $result[$key] = new UserEntity($row);
        }

        return $result;
    }

    /**
     * Apply changes in bulk to users in an organization
     *
     * @param int $organizationId Organization ID
     * @param UserBulkUpdateRequest $request Parameter
     *
     * @return bool
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/organizations#patch-apply-changes-in-bulk-to-users-in-an-organization
     */
    public function bulkUpdate(int $organizationId, UserBulkUpdateRequest $request): bool
    {
        $url = '/organizations/' . $organizationId . '/users';

        return $this->requestPatch($url, $request->toArray())->isSuccessful();
    }

    /**
     * Change organization user
     *
     * @param int $organizationId Organization ID
     * @param int $organizationUserId Organization user ID
     * @param UserUpdateRequest $request Parameter
     *
     * @return bool
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/organizations#put-changes-a-single-organization-user
     */
    public function update(int $organizationId, int $organizationUserId, UserUpdateRequest $request): bool
    {
        $url = '/organizations/' . $organizationId . '/users/' . $organizationUserId;
        return $this->requestPut($url, $request->toArray())->isSuccessful();
    }

    public function leave(): Leave
    {
        return new Leave($this->getClient());
    }
}
