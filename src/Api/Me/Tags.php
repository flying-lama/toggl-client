<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Me;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Entity\TagEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;

class Tags extends AbstractApi
{
    /**
     * Returns tags for the current user
     *
     * @param int|null $since Retrieve tags modified/deleted since this date using UNIX timestamp
     *
     * @return TagEntity[]
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/me#get-tags
     */
    public function list(?int $since = null): array
    {
        $response = $this->requestGet('/me/tags', ['since' => $since])->getJson();

        $result = [];
        foreach ($response as $key => $row) {
            $result[$key] = new TagEntity($row);
        }

        return $result;
    }
}
