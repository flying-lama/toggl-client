<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Util\Caster;

use Attribute;

#[Attribute(Attribute::TARGET_PROPERTY)]
class ValueCaster
{
    public string $casterClass;

    public function __construct(string $casterClass)
    {
        $this->casterClass = $casterClass;
    }

    public function cast($object, string $property, $value)
    {
        /** @var CastsValue $casterClass */
        $casterClass = new $this->casterClass();

        return $casterClass->cast($object, $property, $value);
    }
}
