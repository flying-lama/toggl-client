<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Exception;

use Exception;
use Psr\Http\Client\ClientExceptionInterface;

class ClientException extends Exception implements ExceptionInterface, ClientExceptionInterface
{
}
