<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Me;

use FlyingLama\TogglApi\Api\AbstractApi;
use FlyingLama\TogglApi\Entity\ProjectEntity;
use FlyingLama\TogglApi\Exception\ClientException;
use FlyingLama\TogglApi\Exception\HttpException;
use JsonException;

class Projects extends AbstractApi
{
    /**
     * Get Projects
     *
     * @param int|null $since Retrieve clients created/modified/deleted since this date using UNIX timestamp
     * @param string $archived Include archived projects
     *
     * @return ProjectEntity[]
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see parent::ARCHIVED_INCLUDE
     * @see parent::ARCHIVED_EXCLUDE
     * @see https://developers.track.toggl.com/docs/api/me#get-projects
     */
    public function list(?int $since = null, string $archived = parent::ARCHIVED_EXCLUDE): array
    {
        $response = $this->requestGet(
            '/me/projects',
            [
                'since' => $since,
                'include_archived' => $archived === parent::ARCHIVED_INCLUDE
            ]
        )->getJson();

        $result = [];
        foreach ($response as $key => $row) {
            $result[$key] = new ProjectEntity($row);
        }

        return $result;
    }

    /**
     * Get paginated projects
     *
     * @param int|null $startProjectId Project ID to resume the next pagination from
     * @param int|null $since Retrieve projects created/modified/deleted since this date using UNIX timestamp.
     * @param int|null $perPage Number of items per page, default 201
     *
     * @return ProjectEntity[]
     * @throws ClientException
     * @throws HttpException
     * @throws JsonException
     * @see https://developers.track.toggl.com/docs/api/me#get-projectspaginated
     */
    public function listPaginated(?int $startProjectId = null, ?int $since = null, ?int $perPage = null): array
    {
        $response = $this->requestGet(
            '/me/projects/paginated',
            [
                'start_project_id' => $startProjectId,
                'since' => $since,
                'per_page' => $perPage
            ]
        )->getJson();

        $result = [];
        foreach ($response as $key => $row) {
            $result[$key] = new ProjectEntity($row);
        }

        return $result;
    }
}
