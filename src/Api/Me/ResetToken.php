<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Me;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;

class ResetToken extends AbstractApi
{
    /**
     * Resets API token for the current user
     *
     * @return bool
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/authentication#post-resettoken
     */
    public function execute(): bool
    {
        return $this->requestPost('/me/reset_token')->isSuccessful();
    }
}
