<?php

namespace App\Helpers;

class TextHelper
{
    public static function format001($text)
    {
        return ucfirst(str_replace('_', ' ', $text));
    }

    public static function uppercase($text)
    {
        return strtoupper($text);
    }

    public static function reverseSlug($text, $slug = '-')
    {
        return ucwords(str_replace($slug, ' ', $text));
    }
}
