<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\RestClient\Authentication;

use FlyingLama\TogglApi\RestClient\RestClient;
use Psr\Http\Message\MessageInterface;

use function base64_encode;

class BasicAuthentication extends AbstractAuthentication implements AuthenticationInterface
{
    public const TYPE = 'basic_auth';
    private string $authorizationHeader;

    public function __construct(string $username, string $password)
    {
        $this->authorizationHeader = 'Basic ' . base64_encode($username . ':' . $password);
    }

    public function authenticate(MessageInterface $request, RestClient $client): MessageInterface
    {
        return $request->withHeader('Authorization', $this->authorizationHeader);
    }
}
