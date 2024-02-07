<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Me;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Me\Preferences\Client;
use FlyingLama\TogglApi\Api\Request\Me\MeUpdateRequest;
use FlyingLama\TogglApi\Entity\Me\PreferencesEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;
use ReflectionException;

class Preferences extends AbstractApi
{
    /**
     * Returns user preferences and alpha features
     *
     * @return PreferencesEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/preferences#get-preferences-for-the-current-user
     */
    public function list(): PreferencesEntity
    {
        $response = $this->requestGet('/me/preferences')->getJson();

        return new PreferencesEntity($response);
    }

    /**
     * Update user preferences and alpha features
     *
     * @param MeUpdateRequest $request
     *
     * @return bool
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/preferences#post-update-the-preferences-for-the-current-user
     */
    public function update(MeUpdateRequest $request): bool
    {
        return $this->requestPost('/me/preferences', $request->toArray())->isSuccessful();
    }

    public function client(): Client
    {
        return new Client($this->getClient());
    }
}
