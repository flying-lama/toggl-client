<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\RestClient;

use FlyingLama\TogglApi\Exception\AuthenticationException;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\RestClient\Authentication\AuthenticationInterface;
use GuzzleHttp\Client as GuzzleClient;
use GuzzleHttp\Psr7\Request;
use JsonException;
use Psr\Http\Client\ClientExceptionInterface;
use Psr\Http\Message\MessageInterface;
use Throwable;

use function array_merge;
use function count;
use function http_build_query;
use function json_encode;
use function sprintf;

use const JSON_THROW_ON_ERROR;
use const PHP_QUERY_RFC3986;

class RestClient
{
    public const API_GENERAL = 'general';
    public const API_REPORT = 'report';
    public const API_INSIGHTS = 'insights';
    public const BASE_GENERAL_API = 'https://api.track.toggl.com/api/v9';
    public const BASE_REPORT_API = 'https://api.track.toggl.com/reports/api/v3';
    public const BASE_INSIGHTS_API = 'https://api.track.toggl.com/insights/api/v1';

    protected AuthenticationInterface $auth;
    protected GuzzleClient $httpClient;
    protected RestClientOptions $options;

    protected string $apiEndpoint;

    public function __construct(
        AuthenticationInterface $authentication,
        ?RestClientOptions $options = null,
        $apiEndpoint = self::API_GENERAL
    ) {
        $this->options = $options ?? new RestClientOptions();
        $this->httpClient = new GuzzleClient();

        $this->auth = $authentication;
        $this->apiEndpoint = $apiEndpoint;
    }

    public function getHttpClient(): GuzzleClient
    {
        return $this->httpClient;
    }

    /**
     * @param string $uri
     * @param array<string, mixed> $params
     * @param array<string, string> $headers
     * @param AuthenticationInterface|null $auth
     *
     * @return Response
     * @throws AuthenticationException
     * @throws ClientException
     */
    public function requestGet(
        string $uri,
        array $params = [],
        array $headers = [],
        ?AuthenticationInterface $auth = null
    ): Response {
        $request = new Request('GET', $this->prepareUri($uri, $params), $headers);
        $request = $this->authenticate($request, $auth);
        try {
            $response = $this->httpClient->sendRequest($request);
        } catch (ClientExceptionInterface $exception) {
            throw new ClientException($exception->getMessage(), $exception->getCode(), $exception);
        }

        return new Response($request, $response);
    }

    /**
     * @param string $uri
     * @param array<string, mixed> $query
     *
     * @return string
     */
    public function prepareUri(string $uri, array $query = []): string
    {
        return $this->getApiUrl() . $uri . sprintf('?%s', http_build_query($query, '', '&', PHP_QUERY_RFC3986));
    }

    public function getApiUrl(): string
    {
        if ($this->apiEndpoint === self::API_GENERAL) {
            return $this->options->generalApiUrl;
        }

        if ($this->apiEndpoint === self::API_REPORT) {
            return $this->options->reportApiUrl;
        }

        if ($this->apiEndpoint === self::API_INSIGHTS) {
            return $this->options->insightsApiUrl;
        }

        return '';
    }

    /**
     * @param Request $request
     * @param AuthenticationInterface|null $authentication
     *
     * @return Request
     * @throws AuthenticationException
     */
    public function authenticate(
        MessageInterface $request,
        ?AuthenticationInterface $authentication = null
    ): MessageInterface {
        $auth = $authentication ?? $this->auth;
        try {
            return $auth->authenticate($request, $this);
        } catch (Throwable $throwable) {
            throw new AuthenticationException($authentication, $throwable);
        }
    }

    /**
     * @param string $uri
     * @param array<string, mixed> $params
     * @param array<string, string> $headers
     * @param AuthenticationInterface|null $auth
     *
     * @return Response
     * @throws AuthenticationException
     * @throws ClientException
     * @throws JsonException
     */
    public function requestPost(
        string $uri,
        array $params = [],
        array $headers = [],
        ?AuthenticationInterface $auth = null
    ): Response {
        $body = self::prepareJsonBody($params);

        if (null !== $body) {
            $headers = $this->addJsonContentType($headers);
        }

        $request = new Request('POST', $this->prepareUri($uri), $headers, $body);
        $request = $this->authenticate($request, $auth);

        try {
            $response = $this->httpClient->sendRequest($request);
        } catch (ClientExceptionInterface $exception) {
            throw new ClientException($exception->getMessage(), $exception->getCode(), $exception);
        }

        return new Response($request, $response);
    }

    /**
     * @param array<string, mixed> $params
     *
     * @return string|null
     * @throws JsonException
     */
    private static function prepareJsonBody(array $params): ?string
    {
        if (0 === count($params)) {
            return null;
        }

        return json_encode($params, JSON_THROW_ON_ERROR);
    }

    /**
     * @param array<string, string> $headers
     *
     * @return array<string, string>
     */
    private function addJsonContentType(array $headers): array
    {
        return array_merge(['Content-Type' => 'application/json'], $headers);
    }

    /**
     * @param string $uri
     * @param array<string, mixed> $params
     * @param array<string, string> $headers
     * @param AuthenticationInterface|null $auth
     *
     * @return Response
     * @throws AuthenticationException
     * @throws ClientException
     * @throws JsonException
     */
    public function requestPut(
        string $uri,
        array $params = [],
        array $headers = [],
        ?AuthenticationInterface $auth = null
    ): Response {
        $body = self::prepareJsonBody($params);

        if (null !== $body) {
            $headers = $this->addJsonContentType($headers);
        }

        $request = new Request('PUT', $this->prepareUri($uri), $headers, $body);
        $request = $this->authenticate($request, $auth);

        try {
            $response = $this->httpClient->sendRequest($request);
        } catch (ClientExceptionInterface $exception) {
            throw new ClientException($exception->getMessage(), $exception->getCode(), $exception);
        }

        return new Response($request, $response);
    }

    /**
     * @param string $uri
     * @param array<string, mixed> $params
     * @param array<string, string> $headers
     * @param AuthenticationInterface|null $auth
     *
     * @return Response
     * @throws AuthenticationException
     * @throws ClientException
     * @throws JsonException
     */
    public function requestPatch(
        string $uri,
        array $params = [],
        array $headers = [],
        ?AuthenticationInterface $auth = null
    ): Response {
        $body = self::prepareJsonBody($params);

        if (null !== $body) {
            $headers = $this->addJsonContentType($headers);
        }

        $request = new Request('PATCH', $this->prepareUri($uri), $headers, $body);
        $request = $this->authenticate($request, $auth);

        try {
            $response = $this->httpClient->sendRequest($request);
        } catch (ClientExceptionInterface $exception) {
            throw new ClientException($exception->getMessage(), $exception->getCode(), $exception);
        }

        return new Response($request, $response);
    }

    /**
     * @param string $uri
     * @param array<string, mixed> $params
     * @param array<string, string> $headers
     * @param AuthenticationInterface|null $auth
     *
     * @return Response
     * @throws AuthenticationException
     * @throws ClientException
     * @throws JsonException
     */
    public function requestDelete(
        string $uri,
        array $params = [],
        array $headers = [],
        ?AuthenticationInterface $auth = null
    ): Response {
        $body = self::prepareJsonBody($params);

        if (null !== $body) {
            $headers = $this->addJsonContentType($headers);
        }

        $request = new Request('DELETE', $this->prepareUri($uri), $headers, $body);
        $request = $this->authenticate($request, $auth);
        try {
            $response = $this->httpClient->sendRequest($request);
        } catch (ClientExceptionInterface $exception) {
            throw new ClientException($exception->getMessage(), $exception->getCode(), $exception);
        }

        return new Response($request, $response);
    }

    public function getApiEndpoint(): string
    {
        return $this->apiEndpoint;
    }

    /**
     * @param string $apiEndpoint
     *
     * @return void
     * @see self::API_GENERAL
     * @see self::API_REPORT
     */
    public function setApiEndpoint(string $apiEndpoint): void
    {
        $this->apiEndpoint = $apiEndpoint;
    }
}
