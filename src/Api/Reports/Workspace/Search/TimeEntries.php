<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Reports\Workspace\Search;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Api\Request\Reports\TimeEntrySearchExportRequest;
use FlyingLama\TogglApi\Api\Request\Reports\TimeEntrySearchRequest;
use FlyingLama\TogglApi\Entity\Report\TimeEntrySearchResultEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;
use Psr\Http\Message\StreamInterface;
use ReflectionException;

class TimeEntries extends AbstractApi
{
    /**
     * Detailed report of time entries
     *
     * @param int $workspaceId Workspace ID
     * @param TimeEntrySearchRequest $request Request
     *
     * @return TimeEntrySearchResultEntity[]
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @throws ReflectionException
     * @see https://developers.track.toggl.com/docs/reports/detailed_reports#post-search-time-entries
     */
    public function list(int $workspaceId, TimeEntrySearchRequest $request): array
    {
        $parameter = $request->toArray();
        // client_ids overrules project_ids in toggl API
        if (isset($parameter['project_ids'])) {
            unset($parameter['client_ids']);
        }

        $url = '/workspace/' . $workspaceId . '/search/time_entries';
        $response = $this->requestPost($url, $parameter)->getJson();

        $result = [];
        foreach ($response as $key => $row) {
            $result[$key] = new TimeEntrySearchResultEntity($row);
        }

        return $result;
    }

    /**
     * Export detailed report of time entries
     *
     * @param int $workspaceId Workspace ID
     * @param TimeEntrySearchExportRequest $request Parameter
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
     * @see https://developers.track.toggl.com/docs/reports/exports/index.html#post-export-detailed-report
     * @see https://developers.track.toggl.com/docs/reports/exports/index.html#post-export-detailed-report-1
     */
    public function download(
        int $workspaceId,
        TimeEntrySearchExportRequest $request,
        string $exportFormat = AbstractApi::EXPORT_XLSX
    ): StreamInterface {
        $url = '/workspace/' . $workspaceId . '/search/time_entries.' . $exportFormat;

        return $this->requestPost($url, $request->toArray())->getStream();
    }
}
