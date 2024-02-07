<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Workspaces\Clients;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Request\Workspaces\ClientRestoreRequest;
use FlyingLama\TogglApi\Entity\ClientEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;
use ReflectionException;

class Restore extends AbstractApi
{
    /**
     * Restore client and related projects
     *
     * @param int $workspaceId Workspace ID
     * @param int $clientId Client ID
     * @param ClientRestoreRequest $request
     *
     * @return ClientEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/clients#post-restores-client-and-related-projects
     */
    public function execute(int $workspaceId, int $clientId, ClientRestoreRequest $request): ClientEntity
    {
        $url = '/workspaces/' . $workspaceId . '/clients/' . $clientId . '/restore';
        $response = $this->requestPost($url, $request->toArray())->getJson();

        return new ClientEntity($response);
    }
}
