<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Me;

use FlyingLama\TogglApi\Entity\AbstractEntity;

class PreferencesEntity extends AbstractEntity
{
    /**
     * @var bool|null
     */
    public ?bool $collapseTimeEntries = null;
    /**
     * @var bool|null
     */
    public ?bool $toSAcceptNeeded = null;
    /**
     * @var bool|null
     */
    public ?bool $sendProductEmails = null;
    /**
     * @var bool|null
     */
    public ?bool $sendTimerNotifications = null;
    /**
     * @var string|null
     */
    public ?string $dateFormat = null;
    /**
     * @var string|null
     */
    public ?string $timeofdayFormat = null;
    /**
     * @var string|null
     */
    public ?string $durationFormat = null;
    /**
     * @var bool|null
     */
    public ?bool $recordTimeline = null;
    /**
     * @var bool|null
     */
    public ?bool $sendWeeklyReport = null;
    /**
     * @var string|null
     */
    public ?string $pgTimeZoneName = null;
    /**
     * @var int|null Calender visible hours end
     */
    public ?int $calendarVisibleHoursEnd = null;
    /**
     * @var int|null Calender visible hours start
     */
    public ?int $calendarVisibleHoursStart = null;
    /**
     * @var bool|null Collapse detailed report entries
     */
    public ?bool $collapseDetailedReportEntries = null;
    /**
     * @var string|null Decimal separator
     */
    public ?string $decimalSeparator = null;
    /**
     * @var string|null Display density
     */
    public ?string $displayDensity = null;
    /**
     * @var string|null District rates
     */
    public ?string $distinctRates = null;
    /**
     * @var bool|null Duration format on timer duration field
     */
    public ?bool $durationFormatOnTimerDurationField = null;
    /**
     * @var int|null First seen business promo
     */
    public ?int $firstSeenBusinessPromo = null;
    /**
     * @var bool|null Hide keyboard shortcut
     */
    public ?bool $hideKeyboardShortcut = null;
    /**
     * @var int|null Keyboard increment timer page
     */
    public ?int $keyboardIncrementTimerPage = null;
    /**
     * @var bool|null Keyboard shortcuts enabled
     */
    public ?bool $keyboardShortcutsEnabled = null;
    /**
     * @var string|null Manual entry mode
     */
    public ?string $manualEntryMode = null;
    /**
     * @var bool|null Manual mode
     */
    public ?bool $manualMode = null;
    /**
     * @var bool|null Manual mode overlay seen
     */
    public ?bool $manualModeOverlaySeen = null;
    /**
     * @var string|null Offline mode
     */
    public ?string $offlineMode = null;
    /**
     * @var string|null Project dashboard activity mode
     */
    public ?string $projectDashboardActivityMode = null;
    /**
     * @var bool|null Report rounding
     */
    public ?bool $reportRounding = null;
    /**
     * @var string|null Report rounding direction
     */
    public ?string $reportRoundingDirection = null;
    /**
     * @var int|null Report rounding step in minutes
     */
    public ?int $reportRoundingStepInMinutes = null;
    /**
     * @var bool|null Reports hide weekends
     */
    public ?bool $reportsHideWeekends = null;
    /**
     * @var bool|null Seen follow modal
     */
    public ?bool $seenFollowModal = null;
    /**
     * @var bool|null Seen footer popup
     */
    public ?bool $seenFooterPopup = null;
    /**
     * @var bool|null Seen project dashboard overlay
     */
    public ?bool $seenProjectDashboardOverlay = null;
    /**
     * @var bool|null Seen Toggl button modal
     */
    public ?bool $seenTogglButtonModal = null;
    /**
     * @var bool|null Show time in title
     */
    public ?bool $showTimeInTitle = null;
    /**
     * @var bool|null Show timeline in day view
     */
    public ?bool $showTimelineInDayView = null;
    /**
     * @var bool|null Show total billable hours
     */
    public ?bool $showTotalBillableHours = null;
    /**
     * @var bool|null Show weekend on timer page
     */
    public ?bool $showWeekendOnTimerPage = null;
    /**
     * @var string|null Snowball report rounding
     */
    public ?string $snowballReportRounding = null;
    /**
     * @var string|null Stack times on manual mode after
     */
    public ?string $stackTimesOnManualModeAfter = null;
    /**
     * @var string|null Summary report amounts
     */
    public ?string $summaryReportAmounts = null;
    /**
     * @var bool|null Summary report distinct rates
     */
    public ?bool $summaryReportDistinctRates = null;
    /**
     * @var string|null Summary report grouping
     */
    public ?string $summaryReportGrouping = null;
    /**
     * @var bool|null Summary report sort ASC
     */
    public ?bool $summaryReportSortAsc = null;
    /**
     * @var string|null Summary report sort field
     */
    public ?string $summaryReportSortField = null;
    /**
     * @var string|null Summary report sub grouping
     */
    public ?string $summaryReportSubGrouping = null;
    /**
     * @var string|null Theme
     */
    public ?string $theme = null;
    /**
     * @var string|null Timer view
     */
    public ?string $timerView = null;
    /**
     * @var string|null Timer view mobile
     */
    public ?string $timerViewMobile = null;
    /**
     * @var string|null Visible footer
     */
    public ?string $visibleFooter = null;
    /**
     * @var bool|null Web time entry started
     */
    public ?bool $webTimeEntryStarted = null;
    /**
     * @var bool|null Web time entry stopped
     */
    public ?bool $webTimeEntryStopped = null;
    /**
     * @var string|null Weekly report grouping
     */
    public ?string $weeklyReportGrouping = null;
    /**
     * @var string|null Weekly report value to show
     */
    public ?string $weeklyReportValueToShow = null;

    /**
     * @var AlphaFeaturesEntity[]|null
     */
    public ?array $alphaFeatures = null;

    protected function setAlphaFeatures(?array $rows): void
    {
        $this->alphaFeatures = $this->multipleChildren($rows, AlphaFeaturesEntity::class);
    }
}
