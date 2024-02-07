<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Reports\Shared;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Request\Reports\ReportExportRequest;
use FlyingLama\TogglApi\Entity\Report\SavedReportEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;
use Psr\Http\Message\StreamInterface;
use ReflectionException;

class Report extends AbstractApi
{
    /**
     * Get previously saved report
     *
     * @param string $reportToken Report token
     * @param ReportExportRequest $request Parameter
     *
     * @return SavedReportEntity
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/reports/saved_reports#post-load-the-previously-saved-report
     */
    public function post(string $reportToken, ReportExportRequest $request): SavedReportEntity
    {
        $url = '/shared/' . $reportToken;

        $response = $this->requestPost($url, $request->toArray())->getJson();

        return new SavedReportEntity($response);
    }

    /**
     * Download saved report
     *
     * @param string $reportToken Report token
     * @param ReportExportRequest $request Parameter
     * @param string $exportFormat Export format
     *
     * @return StreamInterface
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see AbstractApi::EXPORT_CSV
     * @see AbstractApi::EXPORT_XLSX
     * @see AbstractApi::EXPORT_PDF
     * @see https://developers.track.toggl.com/docs/reports/exports#post-export-saved-report-in-pdf-format
     * @see https://developers.track.toggl.com/docs/reports/exports#post-export-saved-report
     */
    public function download(
        string $reportToken,
        ReportExportRequest $request,
        string $exportFormat = AbstractApi::EXPORT_XLSX
    ): StreamInterface {
        $url = '/shared/' . $reportToken . '/' . $exportFormat;

        return $this->requestPost($url, $request->toArray())->getStream();
    }
}
