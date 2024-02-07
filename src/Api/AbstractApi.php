<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api;

use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use FlyingLama\TogglApi\RestClient\Response;
use FlyingLama\TogglApi\RestClient\RestClient;
use JsonException;

abstract class AbstractApi
{
    public const ARCHIVED_INCLUDE = 'archived_include';
    public const ARCHIVED_EXCLUDE = 'archived_exclude';

    public const INACTIVE_INCLUDE = 'inactive_include';
    public const INACTIVE_EXCLUDE = 'inactive_exclude';

    public const EXPORT_CSV = 'csv';
    public const EXPORT_XLSX = 'xlsx';
    public const EXPORT_PDF = 'pdf';

    private RestClient $client;

    public function __construct(RestClient $client)
    {
        $this->client = $client;
    }

    /**
     * @param string $uri
     * @param array<string, mixed> $params
     * @param array<string, string> $headers
     *
     * @return Response
     * @throws HttpException
     * @throws ClientException
     */
    protected function requestGet(string $uri, array $params = [], array $headers = []): Response
    {
        $response = $this->getClient()->requestGet($uri, $params, $headers);
        $this->verifyResponse($response);

        return $response;
    }

    protected function getClient(): RestClient
    {
        return $this->client;
    }

    /**
     * @throws HttpException
     */
    protected function verifyResponse(Response $response): void
    {
        $response->validate();
    }

    /**
     * @param string $uri
     * @param array<string, mixed> $params
     * @param array<string, string> $headers
     *
     * @return Response
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     */
    protected function requestPost(string $uri, array $params = [], array $headers = []): Response
    {
        $response = $this->getClient()->requestPost($uri, $params, $headers);
        $this->verifyResponse($response);

        return $response;
    }

    /**
     * @param string $uri
     * @param array<string, mixed> $params
     * @param array<string, string> $headers
     *
     * @return Response
     * @throws ClientException
     * @throws JsonException
     * @throws HttpException
     */
    protected function requestPut(string $uri, array $params = [], array $headers = []): Response
    {
        $response = $this->getClient()->requestPut($uri, $params, $headers);
        $this->verifyResponse($response);

        return $response;
    }

    /**
     * @param string $uri
     * @param array<string, mixed> $params
     * @param array<string, string> $headers
     *
     * @return Response
     * @throws ClientException
     * @throws JsonException
     * @throws HttpException
     */
    protected function requestPatch(string $uri, array $params = [], array $headers = []): Response
    {
        $response = $this->getClient()->requestPatch($uri, $params, $headers);
        $this->verifyResponse($response);

        return $response;
    }

    /**
     * @param string $uri
     * @param array<string, mixed> $params
     * @param array<string, string> $headers
     *
     * @return Response
     * @throws ClientException
     * @throws JsonException
     * @throws HttpException
     */
    protected function requestDelete(string $uri, array $params = [], array $headers = []): Response
    {
        $response = $this->getClient()->requestDelete($uri, $params, $headers);
        $this->verifyResponse($response);

        return $response;
    }
}
