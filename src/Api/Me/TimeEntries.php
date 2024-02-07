<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Me;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Me\TimeEntries\Current;
use FlyingLama\TogglApi\Entity\TimeEntryEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;

class TimeEntries extends AbstractApi
{
    /**
     * Lists latest time entries
     *
     * @param int|null $since Get entries modified since this date using UNIX timestamp, including deleted ones
     * @param string|null $before Get entries with start time, before given date (YYYY-MM-DD) or with time in RFC3339
     *     format
     * @param string|null $startDate Get entries with start time, from start_date YYYY-MM-DD or with time in RFC3339
     *     format - To be used with end_date
     * @param string|null $endDate Get entries with start time, until end_date YYYY-MM-DD or with time in RFC3339
     *     format - To be used with start_date
     *
     * @return TimeEntryEntity[]
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/time_entries#get-timeentries
     */
    public function list(
        ?int $since = null,
        ?string $before = null,
        ?string $startDate = null,
        ?string $endDate = null
    ): array {
        $response = $this->requestGet(
            '/me/time_entries',
            [
                'since' => $since,
                'before' => $before,
                'start_date' => $startDate,
                'end_date' => $endDate,
            ]
        )->getJson();

        $result = [];
        foreach ($response as $key => $row) {
            $result[$key] = new TimeEntryEntity($row);
        }

        return $result;
    }

    public function current(): Current
    {
        return new Current($this->getClient());
    }
}
