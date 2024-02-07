<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Exception;

use Exception;
use FlyingLama\TogglApi\RestClient\Authentication\AuthenticationInterface;
use Throwable;

class AuthenticationException extends Exception implements ExceptionInterface
{
    public AuthenticationInterface $authentication;

    public function __construct(AuthenticationInterface $authentication, ?Throwable $previous = null)
    {
        $this->authentication = $authentication;
        $message = sprintf(
            'Failed to authenticate client with authentication type "%s": %s',
            $authentication->getType(),
            $previous ? $previous->getMessage() : 'unknown error'
        );

        parent::__construct($message, 0, $previous);
    }
}
