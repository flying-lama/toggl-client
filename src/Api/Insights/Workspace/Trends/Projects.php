<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Insights\Workspace\Trends;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Request\Insights\ProjectDataTrendRequest;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;
use Psr\Http\Message\StreamInterface;
use ReflectionException;

class Projects extends AbstractApi
{
    /**
     * Export projects data trends
     *
     * @param int $workspaceId Workspace ID
     * @param ProjectDataTrendRequest $request Parameter
     * @param string $exportFormat Export format
     *
     * @return StreamInterface
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see AbstractApi::EXPORT_CSV
     * @see AbstractApi::EXPORT_XLSX
     * @see https://developers.track.toggl.com/docs/reports/exports#post-export-projects-data-trends
     * @see https://developers.track.toggl.com/docs/reports/insights#post-export-projects-data-trends
     */
    public function download(
        int $workspaceId,
        ProjectDataTrendRequest $request,
        string $exportFormat = AbstractApi::EXPORT_XLSX
    ): StreamInterface {
        $url = '/workspace/' . $workspaceId . '/trends/projects.' . $exportFormat;

        return $this->requestPost($url, $request->toArray())->getStream();
    }
}
