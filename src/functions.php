<?php

if (!function_exists('array_fold')) {
    /**
     * Fold all levels of a multidimensional array down
     * to a single level.
     * @param array $array
     * @param bool $withKeys
     * @return array
     */
    function array_fold (array $array, bool $withKeys = true) : array
    {
        $accumulator = [];

        foreach ($array as $key => $value) {
            if (is_array($value)) {
                $accumulator = array_merge(
                    $accumulator,
                    array_fold($value, $withKeys)
                );
                continue;
            }

            if ($withKeys) {
                $accumulator[$key] = $value;
                continue;
            }

            $accumulator[] = $value;
        }

        return $accumulator;
    }
}