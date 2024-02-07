<?php

use FlyingLama\TogglApi\Exception\RuntimeException;

function toSnakeCase(string $str): string
{
    $replaced = preg_split('/(?=[A-Z])/', $str);

    if (false === $replaced) {
        throw new RuntimeException(sprintf('preg_split error: %s', preg_last_error_msg()));
    }

    return strtolower(implode('_', $replaced));
}

function toCamelCase(string $str): string
{
    $callback = static function ($match): string {
        return strtoupper($match[2]);
    };

    $replaced = preg_replace_callback('/(^|_)([a-z])/', $callback, $str);

    if (null === $replaced) {
        throw new RuntimeException(sprintf('preg_replace_callback error: %s', preg_last_error_msg()));
    }

    return lcfirst($replaced);
}
