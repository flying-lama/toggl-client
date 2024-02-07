<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity;

class ClientEntity extends AbstractEntity
{
    /**
     * @var int|null Client ID
     */
    public ?int $id = null;
    /**
     * @var int|null Workspace ID
     */
    public ?int $workspaceId = null;
    /**
     * @var bool|null Whether the client is archived
     */
    public ?bool $archived = null;
    /**
     * @var string|null Name of the client
     */
    public ?string $name = null;
    /**
     * @var string|null Last update date (data refresh)
     */
    public ?string $at = null;
    /**
     * @var string|null Deletion date
     */
    public ?string $serverDeletedAt = null;

    protected function setWid(?int $value): void
    {
        $this->workspaceId = $value;
    }
}
