<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Insights\Workspace\Profitability;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Request\Insights\ProjectProfitabilityRequest;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;
use Psr\Http\Message\StreamInterface;
use ReflectionException;

class Projects extends AbstractApi
{
    /**
     * Downloads profitability project insights
     *
     * @param int $workspaceId Workspace ID
     * @param ProjectProfitabilityRequest $request Parameter
     * @param string $exportFormat Export format
     *
     * @return StreamInterface
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see AbstractApi::EXPORT_CSV
     * @see AbstractApi::EXPORT_XLSX
     * @see https://developers.track.toggl.com/docs/reports/exports#post-export-profitability-project-insights
     * @see https://developers.track.toggl.com/docs/reports/insights#post-export-profitability-project-insights
     */
    public function download(
        int $workspaceId,
        ProjectProfitabilityRequest $request,
        string $exportFormat = AbstractApi::EXPORT_XLSX
    ): StreamInterface {
        $url = '/workspace/' . $workspaceId . '/profitability/projects.' . $exportFormat;

        return $this->requestPost($url, $request->toArray())->getStream();
    }
}
