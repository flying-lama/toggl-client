<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Util;

use FlyingLama\TogglApi\Util\Caster\ValueCaster;
use ReflectionClass;
use ReflectionException;
use ReflectionProperty;

use function toSnakeCase;

trait ArrayableTrait
{
    /**
     * @throws ReflectionException
     */
    public function toArray(): array
    {
        $result = [];
        $called = static::class;

        $reflection = new ReflectionClass($called);
        $properties = $reflection->getProperties(ReflectionProperty::IS_PUBLIC);

        foreach ($properties as $property) {
            $prop = $property->getName();
            if (isset($this->$prop) && $property->class === $called) {
                $value = $this->$prop;

                $casters = $property->getAttributes(ValueCaster::class);
                foreach ($casters as $caster) {
                    /** @var ValueCaster $casterInstance */
                    $casterInstance = $caster->newInstance();
                    $value = $casterInstance->cast($this, $prop, $value);
                }

                if ($value instanceof ArrayableInterface) {
                    $value = $value->toArray();
                }

                $arrayKey = $prop;
                if (count($property->getAttributes(ArrayKeyNoTransform::class)) === 0) {
                    $arrayKey = toSnakeCase($prop);
                }

                $result[$arrayKey] = $value;
            }
        }

        return $result;
    }
}
