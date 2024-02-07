<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\RestClient\Authentication;

use FlyingLama\TogglApi\RestClient\RestClient;
use Psr\Http\Message\MessageInterface;

interface AuthenticationInterface
{
    public function getType(): string;

    public function authenticate(MessageInterface $request, RestClient $client): MessageInterface;
}
