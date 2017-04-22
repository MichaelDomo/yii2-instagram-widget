<?php

namespace michaeldomo\instashow;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

/**
 * Class SlickAsset
 * @package michaeldomo\instashow
 */
class SlickAssets extends AssetBundle
{
    public $sourcePath = '@bower/slick-carousel/';

    public $css = [
        'slick/slick.css',
        'slick/slick-theme.css',
    ];

    public $js = [
        'slick/slick.min.js',
    ];

    public $depends = [
        JqueryAsset::class,
    ];
}
