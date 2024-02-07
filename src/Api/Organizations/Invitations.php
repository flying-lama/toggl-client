<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Organizations;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Organizations\Invitations\Accept;
use FlyingLama\TogglApi\Api\Organizations\Invitations\Reject;
use FlyingLama\TogglApi\Api\Organizations\Invitations\Resend;
use FlyingLama\TogglApi\Api\Request\Organizations\InvitationCreateRequest;
use FlyingLama\TogglApi\Entity\Organization\InvitationCreationEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;
use ReflectionException;

class Invitations extends AbstractApi
{
    public function accept(): Accept
    {
        return new Accept($this->getClient());
    }

    public function reject(): Reject
    {
        return new Reject($this->getClient());
    }

    public function resend(): Resend
    {
        return new Resend($this->getClient());
    }

    /**
     * Creates a new invitation for the user
     *
     * @param int $organizationId Organization ID
     * @param InvitationCreateRequest $request Parameter
     *
     * @return InvitationCreationEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/api/invitations#post-creates-a-new-invitation-for-the-user
     */
    public function create(int $organizationId, InvitationCreateRequest $request): InvitationCreationEntity
    {
        $response = $this->requestPost(
            '/organizations/' . $organizationId . '/invitations',
            $request->toArray()
        )->getJson();

        return new InvitationCreationEntity($response);
    }
}
