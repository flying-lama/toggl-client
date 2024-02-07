<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Util\Caster\Types;

use FlyingLama\TogglApi\Util\Caster\CastsValue;

class CommaSeparatedList implements CastsValue
{
    public function cast($object, $property, $value)
    {
        return implode(',', $value);
    }
}
