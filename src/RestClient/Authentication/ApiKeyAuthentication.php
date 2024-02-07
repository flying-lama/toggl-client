<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\RestClient\Authentication;

class ApiKeyAuthentication extends BasicAuthentication
{
    public const TYPE = 'api_key_auth';

    public function __construct(string $apiKey)
    {
        parent::__construct($apiKey, 'api_token');
    }
}
