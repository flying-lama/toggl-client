<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Exception;

use RuntimeException as PhpRuntimeException;

class RuntimeException extends PhpRuntimeException implements ExceptionInterface
{
}
