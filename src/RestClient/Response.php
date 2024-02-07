<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\RestClient;

use FlyingLama\TogglApi\Exception\HttpException;
use FlyingLama\TogglApi\Exception\RuntimeException;
use JsonException;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

use function get_debug_type;
use function is_array;
use function json_decode;
use function json_last_error;
use function json_last_error_msg;
use function sprintf;

use const JSON_ERROR_NONE;

class Response
{
    private RequestInterface $request;
    private ResponseInterface $response;

    public function __construct(RequestInterface $request, ResponseInterface $response)
    {
        $this->request = $request;
        $this->response = $response;
    }

    /**
     * @throws JsonException
     */
    public function getJson(): array
    {
        $data = json_decode($this->response->getBody()->getContents(), true, 512, JSON_THROW_ON_ERROR);

        if (JSON_ERROR_NONE !== json_last_error()) {
            throw new RuntimeException(sprintf('json_decode error: %s', json_last_error_msg()));
        }

        if (!is_array($data)) {
            throw new RuntimeException(
                sprintf('json_decode error: Expected JSON of type array, %s given.', get_debug_type($data))
            );
        }

        return $data;
    }

    public function getText(): string
    {
        return $this->response->getBody()->getContents();
    }

    public function getStream(): StreamInterface
    {
        return $this->response->getBody();
    }

    public function isClientError(): bool
    {
        return $this->response->getStatusCode() >= 400 && $this->response->getStatusCode() < 500;
    }

    public function isEmpty(): bool
    {
        return in_array($this->response->getStatusCode(), [204, 205, 304]);
    }

    public function isForbidden(): bool
    {
        return $this->response->getStatusCode() === 403;
    }

    public function isInformational(): bool
    {
        return $this->response->getStatusCode() >= 100 && $this->response->getStatusCode() < 200;
    }

    public function isOk(): bool
    {
        return $this->response->getStatusCode() === 200;
    }

    public function isNotFound(): bool
    {
        return $this->response->getStatusCode() === 404;
    }

    public function isRedirect(): bool
    {
        return in_array($this->response->getStatusCode(), [301, 302, 303, 307, 308]);
    }

    public function isRedirection(): bool
    {
        return $this->response->getStatusCode() >= 300 && $this->response->getStatusCode() < 400;
    }

    public function isServerError(): bool
    {
        return $this->response->getStatusCode() >= 500 && $this->response->getStatusCode() < 600;
    }

    /**
     * @return void
     * @throws HttpException
     */
    public function validate(): void
    {
        if ($this->isSuccessful() === false) {
            throw new HttpException($this->request, $this->response);
        }
    }

    public function isSuccessful(): bool
    {
        return $this->response->getStatusCode() >= 200 && $this->response->getStatusCode() < 300;
    }
}
