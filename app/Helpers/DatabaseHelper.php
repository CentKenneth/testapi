<?php

namespace App\Helpers;

use Illuminate\Support\Facades\Schema;

class DatabaseHelper
{
    /**
     * Get all columns from specified table  
     *
     * @param string $table
     * return boolean
     */
    public static function getTableColumns(string $table)
    {
        $columns = Schema::getColumnListing($table);
        return $columns;
    }

    /**
     * Determine if all columns are existed in specified table
     *
     * @param string $table
     * @param array $columns
     * @return boolean
     */
    public static function areColumnsExists(string $table, array $columns)
    {
        $table_columns = self::getTableColumns($table);
        $not_match = 0;

        foreach ($columns as $key => $value) {
            // Determine if column is not existed in specified table
            if (!in_array($value, $table_columns)) {
                $not_match++;
            }
        }

        return $not_match == 0;
    }

    /**
     * Determine if column is existed in specified table
     *
     * @param string $table
     * @param string $column
     * @return boolean
     */
    public static function isColumnExist(string $table, string $column)
    {
        $table_columns = self::getTableColumns($table);
        return in_array($column, $table_columns);
    }
}