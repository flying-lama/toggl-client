<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Me\Preferences;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Request\Me\ClientUpdateRequest;
use FlyingLama\TogglApi\Entity\Me\PreferencesEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use FlyingLama\TogglApi\Exception\InvalidParameterException;
use JsonException;
use ReflectionException;

class Client extends AbstractApi
{
    /**
     * Get preferences for a specific client of the current user
     *
     * @param string $client Client type
     *
     * @return PreferencesEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws InvalidParameterException
     * @see https://developers.track.toggl.com/docs/api/preferences#get-preferences-for-an-specific-client-of-the-current-user
     */
    public function get(string $client): PreferencesEntity
    {
        if ($client === '') {
            throw new InvalidParameterException('client', $client);
        }

        $response = $this->requestGet('/me/preferences/' . $client)->getJson();

        return new PreferencesEntity($response);
    }

    /**
     * Update current user's client preferences and alpha features
     *
     * @param string $client Client type
     * @param ClientUpdateRequest $request
     *
     * @return bool
     * @throws ClientException
     * @throws HttpException
     * @throws InvalidParameterException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/preferences#post-update-the-preferences-for-an-specific-client-of-the-current-user
     */
    public function update(string $client, ClientUpdateRequest $request): bool
    {
        if ($client === '') {
            throw new InvalidParameterException('client', $client);
        }

        return $this->requestPost('/me/preferences/' . $client, $request->toArray())->isSuccessful();
    }
}
