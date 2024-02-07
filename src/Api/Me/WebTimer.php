<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Me;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Entity\Me\WebTimerEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;

class WebTimer extends AbstractApi
{
    /**
     * Get web timer
     *
     * @return WebTimerEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/me#get-webtimer
     */
    public function get(): WebTimerEntity
    {
        $response = $this->requestGet('/me/web-timer')->getJson();

        return new WebTimerEntity($response);
    }
}
