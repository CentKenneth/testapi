<?php

namespace App\Helpers;

class ArrayHelper
{
    /**
     * Determine if the array index exists and not null
     *
     * @param array $data
     * @param string $index
     * @return boolean
     */
    public static function isset(array $data, string $index)
    {
        return isset($data[$index]) && $data[$index] !== '';
    }

    /**
     * Determine if the array index exists and not null
     *
     * @param array $data
     * @param string $index
     * @return $data[$index] or null
     */
    public static function value(array $data, string $index)
    {
        return isset($data[$index]) ? $data[$index] : null;
    }

    /**
     * Determine if the array index exists and not null (must use for indexes that must return numeric)
     *
     * @param array $data
     * @param string $index
     * @return $data[$index] or null
     */
    public static function numeric(array $data, string $index)
    {
        return isset($data[$index]) ? (float) $data[$index] : 0;
    }

    /**
     * Determine if all inputed data are existed in base data
     *
     * @param array $base_data
     * @param array $inputed_data
     * @return boolean
     */
    public static function isInputedDataExistsInBasedData(array $base_data, array $inputed_data)
    {
        $not_match = 0;
        foreach ($inputed_data as $key => $value) {
            if (!in_array($value, $base_data)) {
                $not_match++;
            }
        }

        return $not_match == 0;
    }

    /**
     * Find the same value in an array
     *
     * @param array $array
     * @param $mixed
     * @return matched value
     */
    public function find(array $array, $value)
    {
        $found_index = array_search($value, $array, true);
        return $found_index === FALSE ? null : $array[$found_index];
    }
}