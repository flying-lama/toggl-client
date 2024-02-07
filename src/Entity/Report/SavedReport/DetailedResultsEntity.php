<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Report\SavedReport;

use FlyingLama\TogglApi\Entity\AbstractEntity;

class DetailedResultsEntity extends AbstractEntity
{
    public $report = null;
    public $totals = null;
}
