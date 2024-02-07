<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Workspaces;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Request\Workspaces\PreferencesUpdateRequest;
use FlyingLama\TogglApi\Entity\Workspace\PreferencesEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException as JsonExceptionAlias;
use ReflectionException;

class Preferences extends AbstractApi
{
    /**
     * Get the preferences for a given workspace
     *
     * @param int $workspaceId Workspace ID
     *
     * @return PreferencesEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonExceptionAlias
     * @see https://developers.track.toggl.com/docs/api/preferences#get-get-workspace-preferences
     */
    public function get(int $workspaceId): PreferencesEntity
    {
        $response = $this->requestGet('/workspaces/' . $workspaceId . '/preferences')->getJson();

        return new PreferencesEntity($response);
    }

    /**
     * Update the preferences for a given workspace
     *
     * @param int $workspaceId Workspace ID
     * @param PreferencesUpdateRequest $request Parameter
     *
     * @return PreferencesEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonExceptionAlias
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/preferences#post-get-workspace-preferences
     */
    public function update(int $workspaceId, PreferencesUpdateRequest $request): PreferencesEntity
    {
        $response = $this->requestPost('/workspaces/' . $workspaceId . '/preferences', $request->toArray())->getJson();

        return new PreferencesEntity($response);
    }
}
