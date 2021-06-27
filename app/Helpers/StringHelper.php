<?php

namespace App\Helpers;

class StringHelper
{
    /**
     * Format Slug to CamelCase
     *
     * @param string $string
     * @param string $separator
     * @return CamelCase string
     */
    public static function slugToCamelCase(string $string, string $separator)
    {
        return str_replace($separator, '', ucwords($string, $separator));
    }

    /**
     * String to Array
     *
     * @param string $string
     * @return array
     */
    public static function toArray(string $string)
    {
        return explode(',', $string);
    }

    /**
     * String to Array then get the last index
     *
     * @param string $string
     * @return string
     */
    public static function toArrayGetLast(string $string)
    {
        $exploded = explode('\\', $string);

        return end($exploded);
    }
}