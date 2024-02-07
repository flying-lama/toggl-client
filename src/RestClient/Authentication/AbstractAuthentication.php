<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\RestClient\Authentication;

class AbstractAuthentication
{
    public const TYPE = 'invalid';

    public function getType(): string
    {
        return static::TYPE;
    }
}
