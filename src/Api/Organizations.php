<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api;

use FlyingLama\TogglApi\Api\Organizations\Groups;
use FlyingLama\TogglApi\Api\Organizations\Invitations;
use FlyingLama\TogglApi\Api\Organizations\Users;
use FlyingLama\TogglApi\Api\Organizations\Workspaces as OrganizationWorkspaces;
use FlyingLama\TogglApi\Api\Request\OrganizationCreateRequest;
use FlyingLama\TogglApi\Api\Request\OrganizationUpdateRequest;
use FlyingLama\TogglApi\Entity\OrganizationEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;
use ReflectionException;

class Organizations extends AbstractApi
{
    /**
     * Returns organization
     *
     * @param int $organizationId Organization ID
     *
     * @return OrganizationEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/organizations#get-organization-data
     */
    public function get(int $organizationId): OrganizationEntity
    {
        $response = $this->requestGet('/organizations/' . $organizationId)->getJson();

        return new OrganizationEntity($response);
    }

    /**
     * Creates a new organization with a single workspace and assigns current user as the organization owner
     *
     * @param OrganizationCreateRequest $request Parameter
     *
     * @return OrganizationEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/organizations#post-creates-a-new-organization
     */
    public function create(OrganizationCreateRequest $request): OrganizationEntity
    {
        $response = $this->requestPost('/organizations', $request->toArray())->getJson();

        return new OrganizationEntity($response);
    }

    /**
     * Updates an Organization
     *
     * @param int $organizationId Organization ID
     * @param OrganizationUpdateRequest $request Parameter
     *
     * @return OrganizationEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     */
    public function update(int $organizationId, OrganizationUpdateRequest $request): OrganizationEntity
    {
        $response = $this->requestPut('/organizations/' . $organizationId, $request->toArray())->getJson();

        return new OrganizationEntity($response);
    }

    public function users(): Users
    {
        return new Users($this->getClient());
    }

    public function workspaces(): OrganizationWorkspaces
    {
        return new OrganizationWorkspaces($this->getClient());
    }

    public function invitations(): Invitations
    {
        return new Invitations($this->getClient());
    }

    public function groups(): Groups
    {
        return new Groups($this->getClient());
    }
}
