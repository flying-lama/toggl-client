<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Organization\InvitationCreations;

use FlyingLama\TogglApi\Entity\AbstractEntity;

class InvitationEntity extends AbstractEntity
{
    /**
     * @var string|null Email address
     */
    public ?string $email = null;
    /**
     * @var int|null Invitation ID
     */
    public ?int $invitationId = null;
    /**
     * @var string|null Invitation URL
     */
    public ?string $inviteUrl = null;
    /**
     * @var int|null Organization ID
     */
    public ?int $organizationId = null;
    /**
     * @var int|null Recipient ID
     */
    public ?int $recipientId = null;
    /**
     * @var int|null Sender ID
     */
    public ?int $senderId = null;
}
