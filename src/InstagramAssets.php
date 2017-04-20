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
        'https://vjs.zencdn.net/4.2/video-js.css',
        'css/style.css'
    ];

    public $js = [
        'https://vjs.zencdn.net/4.2/video.js',
        'js/script.js'
    ];

    public $depends = [
        JqueryAsset::class,
    ];

    public $publishOptions = [
        'forceCopy' => true,
    ];
}
