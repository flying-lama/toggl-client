<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Workspace;

use FlyingLama\TogglApi\Entity\AbstractEntity;

class ProjectGroupEntity extends AbstractEntity
{
    /**
     * @var int|null Group ID
     */
    public ?int $groupId = null;
    /**
     * @var int|null ID
     */
    public ?int $id = null;
    /**
     * @var int|null Project ID
     */
    public ?int $pid = null;
    /**
     * @var int|null Workspace ID
     */
    public ?int $wid = null;
}
