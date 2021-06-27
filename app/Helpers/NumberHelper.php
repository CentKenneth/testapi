<?php

namespace App\Helpers;

class NumberHelper
{
    /**
     * Money Format
     *
     * @param $amount
     * @param $symbol = ''
     * @return string
     */
    public static function moneyFormat($amount, $symbol = '')
    {
        return $symbol . number_format($amount, 2);
    }

    /**
     * Check if null then return 0 else return the actual value
     *
     * @param $amount
     * @return float
     */
    public static function ifNullZero($amount = null)
    {
        // Determine if the amount is not null
        if ($amount) {
            return (float) $amount;
        }

        return 0;
    }
}