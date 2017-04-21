<?php

namespace michaeldomo\instashow;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

/**
 * Class InstagramAssets
 * @package app\widgets\views\instagram\assets
 */
class InstagramAssets extends AssetBundle
{
    public $sourcePath = '@vendor/michaeldomo/yii2-instagram-widget/src/assets/';

    public $css = [
        'css/style.css',
    ];

    public $js = [
        'js/script.js'
    ];

    public $depends = [
        JqueryAsset::class,
        SlickAssets::class
    ];
}
