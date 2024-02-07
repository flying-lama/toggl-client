<?php

namespace FlyingLama\TogglApi\Exception;

use Exception;
use Throwable;

class MissingEntityPropertyException extends Exception implements ExceptionInterface
{
    public function __construct(string $class, string $property, ?Throwable $previous = null)
    {
        $message = sprintf('Undefined property "%s" in class: %s', $property, $class);

        parent::__construct($message, 0, $previous);
    }
}
