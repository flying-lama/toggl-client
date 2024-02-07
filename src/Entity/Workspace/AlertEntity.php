<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Workspace;

use FlyingLama\TogglApi\Entity\AbstractEntity;

class AlertEntity extends AbstractEntity
{
    /**
     * @var int|null Alert ID
     */
    public ?int $id = null;
    /**
     * @var ErrorEntity[]|null Errors
     */
    public ?array $errors = null;
    /**
     * @var int|null Object type
     */
    public ?int $objectType = null;
    /**
     * @var int|null Project ID
     */
    public ?int $projectId = null;
    /**
     * @var string|null Receiver groups
     */
    public ?string $receiverGroups = null;
    /**
     * @var string|null Receiver roles
     */
    public ?string $receiverRoles = null;
    /**
     * @var string|null Receiver users
     */
    public ?string $receiverUsers = null;
    /**
     * @var int|null Receivers
     */
    public ?int $receivers = null;
    /**
     * @var string|null Source kind
     */
    public ?string $sourceKind = null;
    /**
     * @var int|null Threshold
     */
    public ?int $threshold = null;
    /**
     * @var string|null Threshold type
     */
    public ?string $thresholdType = null;
    /**
     * @var string|null Thresholds
     */
    public ?string $thresholds = null;
    /**
     * @var int|null Workspace ID
     */
    public ?int $wid = null;

    public function setErrors(?array $errors): void
    {
        $this->errors = $this->multipleChildren($errors, ErrorEntity::class);
    }
}
