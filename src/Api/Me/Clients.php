<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Me;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Entity\ClientEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;

class Clients extends AbstractApi
{
    /**
     * Get Clients
     *
     * @param int|null $since Retrieve clients created/modified/deleted since this date using UNIX timestamp
     *
     * @return ClientEntity[]
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/me#get-clients
     */
    public function list(?int $since = null): array
    {
        $response = $this->requestGet('/me/clients', ['since' => $since])->getJson();

        $result = [];
        foreach ($response as $key => $row) {
            $result[$key] = new ClientEntity($row);
        }

        return $result;
    }
}
