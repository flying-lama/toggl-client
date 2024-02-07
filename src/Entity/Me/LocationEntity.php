<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity\Me;

use FlyingLama\TogglApi\Entity\AbstractEntity;

class LocationEntity extends AbstractEntity
{
    /**
     * @var string|null City
     */
    public ?string $city = null;
    /**
     * @var string|null Position
     */
    public ?string $cityLatLong = null;
    /**
     * @var string|null Country Code
     */
    public ?string $countryCode = null;
    /**
     * @var string|null Country Name
     */
    public ?string $countryName = null;
    /**
     * @var string|null State
     */
    public ?string $state = null;
}
