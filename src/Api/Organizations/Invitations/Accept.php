<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Organizations\Invitations;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;

class Accept extends AbstractApi
{
    /**
     * Accepts invitation
     *
     * @param string $invitationCode Invitation code
     *
     * @return bool
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/invitations#post-accepts-invitation
     */
    public function execute(string $invitationCode): bool
    {
        return $this->requestPost('/organizations/invitations/' . $invitationCode . '/accept')->isSuccessful();
    }
}
