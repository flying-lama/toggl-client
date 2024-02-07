<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Organizations\Users;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;

class Leave extends AbstractApi
{
    /**
     * Leaves organization
     *
     * Leaves organization, effectively delete user account in org and delete organization if it is last user
     *
     * @param int $organizationId Organization ID
     *
     * @return bool
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/organizations#delete-leaves-organization
     */
    public function delete(int $organizationId): bool
    {
        $url = '/organizations/' . $organizationId . '/users/leave';
        return $this->requestDelete($url)->isSuccessful();
    }
}
