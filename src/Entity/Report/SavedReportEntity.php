<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Report;

use FlyingLama\TogglApi\Entity\AbstractEntity;
use FlyingLama\TogglApi\Entity\Report\SavedReport\DetailedResultsEntity;
use FlyingLama\TogglApi\Entity\Report\SavedReport\DictionariesEntity;
use FlyingLama\TogglApi\Entity\Report\SavedReport\SummaryResultsEntity;
use FlyingLama\TogglApi\Entity\Report\SavedReport\WeeklyResultsEntity;

class SavedReportEntity extends AbstractEntity
{
    public ?DetailedResultsEntity $detailedResults = null;
    public ?DictionariesEntity $dictionaries = null;
    public $features = null;
    public ?bool $fixedDaterange = null;
    public ?bool $hideAmounts = null;
    public $inputParams = null;
    public ?string $reportType = null;
    public $savedParams = null;
    public ?SummaryResultsEntity $summaryResults = null;
    public ?WeeklyResultsEntity $weeklyResults = null;
    public ?string $workspaceLogo = null;

    public function setDetailedResults(?array $detailedResults): void
    {
        $this->detailedResults = $this->singleChild($detailedResults, DetailedResultsEntity::class);
    }

    public function setDictionaries(?array $dictionaries): void
    {
        $this->dictionaries = $this->singleChild($dictionaries, DictionariesEntity::class);
    }

    public function setSummaryResults(?array $summaryResults): void
    {
        $this->summaryResults = $this->singleChild($summaryResults, SummaryResultsEntity::class);
    }

    public function setWeeklyResults(?array $weeklyResults): void
    {
        $this->weeklyResults = $this->singleChild($weeklyResults, WeeklyResultsEntity::class);
    }
}
