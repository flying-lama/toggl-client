<?php

declare(strict_types=1);

namespace FlyingLama\TogglApi\Api\Request;

use FlyingLama\TogglApi\Util\ArrayableInterface;
use FlyingLama\TogglApi\Util\ArrayableTrait;

class AbstractRequest implements ArrayableInterface
{
    use ArrayableTrait {
        toArray as requestToArray;
    }

    /**
     * @return array<string, mixed>
     */
    private array $additionalParams = [];

    /**
     * @return array<string, mixed>
     */
    public function getAdditionalParams(): array
    {
        return $this->additionalParams;
    }

    public function setAdditionalParams(array $additionalParams): void
    {
        $this->additionalParams = $additionalParams;
    }

    public function setAdditionalParam(string $name, mixed $value): void
    {
        $this->additionalParams[$name] = $value;
    }

    public function removeAdditionalParam(string $name): void
    {
        unset($this->additionalParams[$name]);
    }

    public function toArray(): array
    {
        $result = $this->requestToArray();
        $additionalParams = $this->additionalParams;

        foreach ($additionalParams as $paramName => $paramValue) {
            $result[$paramName] = $paramValue;
        }

        return $result;
    }
}
