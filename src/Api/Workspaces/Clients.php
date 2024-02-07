<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Workspaces;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Request\Me\ClientUpdateRequest;
use FlyingLama\TogglApi\Api\Request\Workspaces\ClientCreateRequest;
use FlyingLama\TogglApi\Api\Request\Workspaces\ClientListRequest;
use FlyingLama\TogglApi\Api\Workspaces\Clients\Archive;
use FlyingLama\TogglApi\Api\Workspaces\Clients\Restore;
use FlyingLama\TogglApi\Entity\ClientEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;
use ReflectionException;

class Clients extends AbstractApi
{
    /**
     * Get clients from workspace
     *
     * @param int $workspaceId
     * @param ClientListRequest|null $request
     *
     * @return ClientEntity[]
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/clients#get-list-clients
     */
    public function list(int $workspaceId, ?ClientListRequest $request = null): array
    {
        $queryParameter = $request ? $request->toArray() : [];
        $response = $this->requestGet('/workspaces/' . $workspaceId . '/clients', $queryParameter)->getJson();

        $result = [];
        foreach ($response as $key => $row) {
            $result[$key] = new ClientEntity($row);
        }

        return $result;
    }

    /**
     * Get Client from workspace
     *
     * @param int $workspaceId Workspace ID
     * @param int $clientId Client ID
     *
     * @return ClientEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/clients#get-load-client-from-id
     */
    public function get(int $workspaceId, int $clientId): ClientEntity
    {
        $response = $this->requestGet('/workspaces/' . $workspaceId . '/clients/' . $clientId)->getJson();

        return new ClientEntity($response);
    }

    /**
     * Create workspace client
     *
     * @param int $workspaceId Workspace ID
     * @param ClientCreateRequest $request Parameter
     *
     * @return ClientEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/clients#post-create-client
     */
    public function create(int $workspaceId, ClientCreateRequest $request): ClientEntity
    {
        $response = $this->requestPost('/workspaces/' . $workspaceId . '/clients', $request->toArray())->getJson();

        return new ClientEntity($response);
    }

    /**
     * Update workspace client
     *
     * @param int $workspaceId Workspace ID
     * @param int $clientId Client ID
     * @param ClientUpdateRequest $request Parameter
     *
     * @return ClientEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/clients#put-change-client
     */
    public function update(int $workspaceId, int $clientId, ClientUpdateRequest $request): ClientEntity
    {
        $response = $this->requestPut(
            '/workspaces/' . $workspaceId . '/clients/' . $clientId,
            $request->toArray()
        )->getJson();

        return new ClientEntity($response);
    }

    /**
     * Delete workspace client
     *
     * @param int $workspaceId Workspace ID
     * @param int $clientId Client ID
     *
     * @return bool
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/clients#delete-delete-client
     */
    public function delete(int $workspaceId, int $clientId): bool
    {
        return $this->requestDelete('/workspaces/' . $workspaceId . '/clients/' . $clientId)->isSuccessful();
    }

    public function archive(): Archive
    {
        return new Archive($this->getClient());
    }

    public function restore(): Restore
    {
        return new Restore($this->getClient());
    }
}
