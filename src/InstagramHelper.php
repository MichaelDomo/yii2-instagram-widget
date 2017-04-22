<?php

namespace michaeldomo\instashow;

/**
 * Class InstagramHelper
 * @package michaeldomo\instashow
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

    /**
     * @param string $text
     * @return string
     */
    public static function wrapHashTags($text)
    {
        return preg_replace(
            '/#(\w+)/',
            '<a href="https://instagram.com/explore/tags/$1" target="_blank" rel="nofollow">$1</a>',
            $text
        );
    }
}
