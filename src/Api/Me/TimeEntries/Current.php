<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Me\TimeEntries;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Entity\TimeEntryEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use FlyingLama\TogglApi\Exception\RuntimeException;
use JsonException;

use function str_contains;

class Current extends AbstractApi
{
    /**
     * Get running time entry for user ID
     *
     * @return TimeEntryEntity|null
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/time_entries#get-get-current-time-entry
     */
    public function get(): ?TimeEntryEntity
    {
        try {
            $response = $this->requestGet('/me/time_entries/current')->getJson();
        } catch (RuntimeException $exception) {
            if (str_contains($exception->getMessage(), 'null given')) {
                return null;
            }

            throw $exception;
        }

        return new TimeEntryEntity($response);
    }
}
