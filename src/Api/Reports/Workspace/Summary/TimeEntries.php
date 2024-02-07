<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Reports\Workspace\Summary;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Request\Reports\SummaryExportRequest;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;
use Psr\Http\Message\StreamInterface;
use ReflectionException;

class TimeEntries extends AbstractApi
{
    /**
     * Export summary report of time entries
     *
     * @param int $workspaceId Workspace ID
     * @param SummaryExportRequest $request Parameter
     * @param string $exportFormat Export format
     *
     * @return StreamInterface
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see parent::EXPORT_XLSX
     * @see parent::EXPORT_CSV
     * @see parent::EXPORT_PDF
     * @see https://developers.track.toggl.com/docs/reports/exports/index.html#post-export-summary-report
     * @see https://developers.track.toggl.com/docs/reports/exports/index.html#post-export-summary-report-1
     */
    public function download(
        int $workspaceId,
        SummaryExportRequest $request,
        string $exportFormat = AbstractApi::EXPORT_XLSX
    ): StreamInterface {
        $url = '/workspace/' . $workspaceId . '/search/summary/time_entries.' . $exportFormat;

        return $this->requestPost($url, $request->toArray())->getStream();
    }
}
