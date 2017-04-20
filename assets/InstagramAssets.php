<?php

namespace app\widgets\assets;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

/**
 * Class InstagramAssets
 * @package app\widgets\views\instagram\assets
 */
class InstagramAssets extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web/instagram/';

    public $css = [
        'https://vjs.zencdn.net/4.2/video-js.css',
        'css/style.css',
    ];

    public $js = [
        'https://vjs.zencdn.net/4.2/video.js',
        'js/script.js',
    ];

    public $depends = [
        JqueryAsset::class,
    ];
}
