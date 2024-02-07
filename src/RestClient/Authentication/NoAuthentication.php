<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\RestClient\Authentication;

use FlyingLama\TogglApi\RestClient\RestClient;
use Psr\Http\Message\MessageInterface;

class NoAuthentication extends AbstractAuthentication implements AuthenticationInterface
{
    public const TYPE = 'no_auth';

    public function authenticate(MessageInterface $request, RestClient $client): MessageInterface
    {
        return $request;
    }
}
