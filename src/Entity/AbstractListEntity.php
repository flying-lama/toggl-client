<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity;

abstract class AbstractListEntity extends AbstractEntity
{
    /**
     * @var int|null Page number
     */
    public ?int $page = null;
    /**
     * @var int|null Per page
     */
    public ?int $perPage = null;
    /**
     * @var string|null Sort field
     */
    public ?string $sortField = null;
    /**
     * @var string|null Sort order
     */
    public ?string $sortOrder = null;
    /**
     * @var int|null Total item count
     */
    public ?int $totalCount = null;
}
