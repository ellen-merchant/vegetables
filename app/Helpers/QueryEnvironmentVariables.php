<?php

namespace Ellllllen\Helpers;

class QueryEnvironmentVariables
{
    /**
     * @param string $variableName
     * @return array|false|string
     */
    public static function getVariable(string $variableName)
    {
        if (getenv($variableName) !== false) {
            return getenv($variableName);
        }

        throw new \InvalidArgumentException("Environment variable not found: {$variableName}");
    }
}