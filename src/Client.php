<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi;

use FlyingLama\TogglApi\Api\Insights;
use FlyingLama\TogglApi\Api\Me;
use FlyingLama\TogglApi\Api\Organizations;
use FlyingLama\TogglApi\Api\Reports;
use FlyingLama\TogglApi\Api\Workspaces;
use FlyingLama\TogglApi\RestClient\Authentication\AuthenticationInterface;
use FlyingLama\TogglApi\RestClient\RestClient;
use FlyingLama\TogglApi\RestClient\RestClientOptions;

class Client
{
    protected RestClient $restClient;

    public function __construct(AuthenticationInterface $authentication, ?RestClientOptions $options = null)
    {
        $this->restClient = new RestClient($authentication, $options);
    }

    public function me(): Me
    {
        $this->restClient->setApiEndpoint(RestClient::API_GENERAL);
        return new Me($this->restClient);
    }

    public function organizations(): Organizations
    {
        $this->restClient->setApiEndpoint(RestClient::API_GENERAL);
        return new Organizations($this->restClient);
    }

    public function workspaces(): Workspaces
    {
        $this->restClient->setApiEndpoint(RestClient::API_GENERAL);
        return new Workspaces($this->restClient);
    }

    public function reports(): Reports
    {
        $this->restClient->setApiEndpoint(RestClient::API_REPORT);
        return new Reports($this->restClient);
    }

    public function insights(): Insights
    {
        $this->restClient->setApiEndpoint(RestClient::API_INSIGHTS);
        return new Insights($this->restClient);
    }
}
