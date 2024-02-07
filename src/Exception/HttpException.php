<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Exception;

use Exception;
use Psr\Http\Client\RequestExceptionInterface;
use Psr\Http\Message\RequestInterface;
use Psr\Http\Message\ResponseInterface;
use Throwable;

class HttpException extends Exception implements ExceptionInterface, RequestExceptionInterface
{
    private RequestInterface $request;

    private ResponseInterface $response;

    public function __construct(RequestInterface $request, ResponseInterface $response, ?Throwable $previous = null)
    {
        $this->request = $request;
        $this->response = $response;
        $message = $this->buildMessage();

        parent::__construct($message, 0, $previous);
    }

    public function buildMessage(): string
    {
        return sprintf(
            'Request %s %s - %s %s: %s',
            $this->request->getMethod(),
            $this->request->getRequestTarget(),
            $this->response->getStatusCode(),
            $this->response->getReasonPhrase(),
            substr($this->response->getBody()->getContents(), 0, 200),
        );
    }

    /**
     * {@inheritdoc}
     */
    public function getRequest(): RequestInterface
    {
        return $this->request;
    }

    public function getResponse(): ResponseInterface
    {
        return $this->response;
    }
}
