<?php

namespace FlyingLama\TogglApi\Exception;

use Exception;
use Throwable;

class InvalidParameterException extends Exception implements ExceptionInterface
{
    public string $parameter;
    public mixed $value;

    public function __construct(string $parameter, mixed $value, ?Throwable $previous = null)
    {
        $this->parameter = $parameter;
        $this->value = $value;
        $message = sprintf('Invalid parameter value for "%s": %s', $parameter, $value);

        parent::__construct($message, 0, $previous);
    }
}
