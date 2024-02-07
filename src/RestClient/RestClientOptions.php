<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\RestClient;

class RestClientOptions
{
    public string $generalApiUrl = RestClient::BASE_GENERAL_API;
    public string $reportApiUrl = RestClient::BASE_REPORT_API;
    public string $insightsApiUrl = RestClient::BASE_INSIGHTS_API;
}
