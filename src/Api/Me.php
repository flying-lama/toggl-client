<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api;

use FlyingLama\TogglApi\Api\Me\Clients;
use FlyingLama\TogglApi\Api\Me\Logged;
use FlyingLama\TogglApi\Api\Me\Preferences;
use FlyingLama\TogglApi\Api\Me\Projects;
use FlyingLama\TogglApi\Api\Me\ResetToken;
use FlyingLama\TogglApi\Api\Me\Tags;
use FlyingLama\TogglApi\Api\Me\Tasks;
use FlyingLama\TogglApi\Api\Me\TimeEntries;
use FlyingLama\TogglApi\Api\Me\TrackReminders;
use FlyingLama\TogglApi\Api\Me\WebTimer;
use FlyingLama\TogglApi\Api\Me\Workspaces;
use FlyingLama\TogglApi\Api\Request\Me\MeUpdateRequest;
use FlyingLama\TogglApi\Entity\MeEntity;
use FlyingLama\TogglApi\Entity\MeExtendedEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use ReflectionException;

class Me extends AbstractApi
{
    public const RELATED_DATA_INCLUDE = 'with_related_data';
    public const RELATED_DATA_EXCLUDE = 'without_related_data';

    /**
     * Returns details for the current user
     *
     * @return MeEntity
     * @throws ClientExceptionInterface
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/me#get-me
     */
    public function get(): MeEntity
    {
        $response = $this->getRequest(self::RELATED_DATA_EXCLUDE);

        return new MeEntity($response);
    }

    /**
     * @param string $relatedData
     *
     * @return array
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     */
    protected function getRequest(string $relatedData): array
    {
        $withRelatedData = $relatedData === self::RELATED_DATA_INCLUDE;
        $queryParams = ['with_related_data' => $withRelatedData];

        return $this->requestGet('/me', $queryParams)->getJson();
    }

    /**
     * Returns details for the current user (with related data)
     *
     * Additionally returns clients, projects, tasks, tags, workspaces, time entries, etc.
     *
     * @return MeExtendedEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/me#get-me
     */
    public function getWithRelatedData(): MeExtendedEntity
    {
        $response = $this->getRequest(self::RELATED_DATA_INCLUDE);

        return new MeExtendedEntity($response);
    }

    /**
     * Updates details for the current user.
     *
     * @param MeUpdateRequest $request
     *
     * @return MeEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/me#put-me
     */
    public function update(MeUpdateRequest $request): MeEntity
    {
        $response = $this->requestPut('/me', $request->toArray())->getJson();

        return new MeEntity($response);
    }

    public function logged(): Logged
    {
        return new Logged($this->getClient());
    }

    public function preferences(): Preferences
    {
        return new Preferences($this->getClient());
    }

    public function workspaces(): Workspaces
    {
        return new Workspaces($this->getClient());
    }

    public function clients(): Clients
    {
        return new Clients($this->getClient());
    }

    public function projects(): Projects
    {
        return new Projects($this->getClient());
    }

    public function timeEntries(): TimeEntries
    {
        return new TimeEntries($this->getClient());
    }

    public function tasks(): Tasks
    {
        return new Tasks($this->getClient());
    }

    public function tags(): Tags
    {
        return new Tags($this->getClient());
    }

    public function trackReminders(): TrackReminders
    {
        return new TrackReminders($this->getClient());
    }

    public function webTimer(): WebTimer
    {
        return new WebTimer($this->getClient());
    }

    public function resetToken(): ResetToken
    {
        return new ResetToken($this->getClient());
    }
}
