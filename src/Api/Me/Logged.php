<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Me;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;

class Logged extends AbstractApi
{
    /**
     * Used to check if authentication works.
     *
     * @return bool
     * @throws ClientException
     * @throws HttpException
     * @see https://developers.track.toggl.com/docs/api/me#get-logged
     */
    public function get(): bool
    {
        return $this->requestGet('/me/logged')->isSuccessful();
    }
}
