<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Organization;

use FlyingLama\TogglApi\Entity\AbstractEntity;
use FlyingLama\TogglApi\Entity\Organization\InvitationCreations\InvitationEntity;

class InvitationCreationEntity extends AbstractEntity
{
    /**
     * @var InvitationEntity[]|null Invitations
     */
    public ?array $data = null;
    /**
     * @var string[]|null Messages
     */
    public ?array $messages = null;

    public function setData(?array $data): void
    {
        $this->data = $this->multipleChildren($data, InvitationEntity::class);
    }
}
