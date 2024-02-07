<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Util\Caster;

interface CastsValue
{
    public function cast($object, string $property, $value);
}
