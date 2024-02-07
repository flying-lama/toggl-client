<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Workspace;

use FlyingLama\TogglApi\Entity\AbstractEntity;

class SubscriptionEntity extends AbstractEntity
{
    /**
     * @var bool|null Whether auto renew is enabled
     */
    public ?bool $autoRenew = null;
    /**
     * @var mixed Card details
     */
    public $cardDetails = null;
    /**
     * @var int|null Company ID
     */
    public ?int $companyId = null;
    /**
     * @var mixed Contact detail
     */
    public $contactDetail = null;
    /**
     * @var string|null Creation date
     */
    public ?string $createdAt = null;
    /**
     * @var string|null Currency
     */
    public ?string $currency = null;
    /**
     * @var int|null Customer ID
     */
    public ?int $customerId = null;
    /**
     * @var string|null Deletion date
     */
    public ?string $deletedAt = null;
    /**
     * @var int|null Last pricing plan ID
     */
    public ?int $lastPricingPlanId = null;
    /**
     * @var int|null Organization ID
     */
    public ?int $organizationId = null;
    /**
     * @var mixed Payment details
     */
    public $paymentDetails = null;
    /**
     * @var int|null Pricing plan ID
     */
    public ?int $pricingPlanId = null;
    /**
     * @var string|null Renewal date
     */
    public ?string $renewalAt = null;
    /**
     * @var int|null Subscription ID
     */
    public ?int $subscriptionId = null;
    /**
     * @var null Subscription period
     */
    public $subscriptionPeriod = null;
    /**
     * @var int|null Workspace ID
     */
    public ?int $workspaceId = null;
}
