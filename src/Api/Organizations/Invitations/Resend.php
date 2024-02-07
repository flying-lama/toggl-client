<?php

namespace FlyingLama\TogglApi\Api\Organizations\Invitations;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;

class Resend extends AbstractApi
{
    /**
     * Resends user their invitation
     *
     * @param int $organizationId Organization ID
     * @param string $invitationCode Invitation code
     *
     * @return bool
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/invitations#put-resends-user-their-invitation
     */
    public function execute(int $organizationId, string $invitationCode): bool
    {
        return $this->requestPut(
            '/organizations/' . $organizationId . '/invitations/' . $invitationCode . '/resend'
        )->isSuccessful();
    }
}
