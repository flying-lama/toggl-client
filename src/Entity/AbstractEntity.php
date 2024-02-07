<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Entity;

use FlyingLama\TogglApi\Exception\MissingEntityPropertyException;
use FlyingLama\TogglApi\Util\ArrayableInterface;
use FlyingLama\TogglApi\Util\ArrayableTrait;
use stdClass;

use function debug_backtrace;
use function get_object_vars;
use function is_object;
use function method_exists;
use function property_exists;
use function toCamelCase;
use function trigger_error;
use function ucfirst;

use const E_USER_NOTICE;

abstract class AbstractEntity implements ArrayableInterface
{
    use ArrayableTrait;

    /**
     * @var array<string, mixed>
     */
    public array $unmappedValues = [];

    /**
     * @param object|array|null $parameters
     *
     * @return void
     */
    public function __construct($parameters = null)
    {
        if (null === $parameters) {
            return;
        }

        if (is_object($parameters)) {
            $parameters = get_object_vars($parameters);
        }

        $this->build($parameters);
    }

    public function build(array $parameters): void
    {
        foreach ($parameters as $property => $value) {
            $property = toCamelCase($property);

            $customSetter = 'set' . ucfirst($property);
            if (method_exists($this, $customSetter)) {
                $this->$customSetter($value);
                continue;
            }

            if (property_exists($this, $property)) {
                $this->$property = $value;
                continue;
            }

            if (defined('ENTITY_THROW_ERROR_FOR_MISSING_PROPERTIES')) {
                throw new MissingEntityPropertyException(static::class, $property);
            }

            $this->unmappedValues[$property] = $value;
        }
    }

    public function __get(string $name)
    {
        $name = toCamelCase($name);
        if (property_exists($this, $name)) {
            return $this->{$name};
        }

        $trace = debug_backtrace();
        trigger_error(
            'Undefined property ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE
        );

        return null;
    }

    public function __set(string $name, $value): void
    {
        $name = toCamelCase($name);
        if (property_exists($this, $name)) {
            $this->{$name} = $value;
        }

        $trace = debug_backtrace();
        trigger_error(
            'Undefined property ' . $name .
            ' in ' . $trace[0]['file'] .
            ' on line ' . $trace[0]['line'],
            E_USER_NOTICE
        );
    }

    public function __isset(string $name): bool
    {
        if (!property_exists($this, $name)) {
            return false;
        }

        return isset($this->{$name});
    }

    /**
     * @param array<mixed, array<string, array|object>> $children
     * @param string $class
     *
     * @return array<mixed, array<string, object>>
     */
    protected function multipleChildren(array $children, string $class): array
    {
        $result = [];
        foreach ($children as $key => $child) {
            if ($child instanceof $class) {
                continue;
            }

            $result[$key] = $this->singleChild($child, $class);
        }

        return $result;
    }

    /**
     * @param object|array<string, mixed> $values
     * @param string $class
     *
     * @return object
     */
    protected function singleChild(array|object $values, string $class): object
    {
        if ($values instanceof stdClass) {
            $values = get_object_vars($values);
        }

        return new $class($values);
    }
}
