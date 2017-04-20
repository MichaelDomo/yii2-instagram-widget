<?php

namespace app\helpers;

/**
 * Class InstagramHelper
 * @package app\helpers
 */
class InstagramHelper
{

    /**
     * @param $items
     * @param $limit
     * @return array
     */
    public static function arraySplice($items, $limit)
    {
        if (count($items) > $limit) {
            return array_splice($items, 0, $limit);
        }

        return $items;
    }
}
