<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Workspaces\Clients;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;

class Archive extends AbstractApi
{
    /**
     * Archives a workspace client and related projects. (Only for premium workspaces)
     *
     * Note:
     * Instead of an entity object, a response object is returned because without a subscription testing isn't possible.
     * Also the official API docs do not clearly describe what exactly is returned here - Feedback is welcome!
     *
     * @param int $workspaceId Workspace ID
     * @param int $clientId Client ID
     *
     * @return array projects that were archived with the client
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/clients#post-archives-client
     */
    public function execute(int $workspaceId, int $clientId)
    {
        $url = '/workspaces/' . $workspaceId . '/clients/' . $clientId . '/archive';
        $response = $this->requestPost($url)->getJson();

        return $response;
    }
}
