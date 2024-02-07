<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Report\SavedReport;

use FlyingLama\TogglApi\Entity\AbstractEntity;

class DictionariesEntity extends AbstractEntity
{
    public $clients = null;
    public $filters = null;
    public $projects = null;
    public $tags = null;
    public $tasks = null;
    public $userGroups = null;
    public $users = null;
}
