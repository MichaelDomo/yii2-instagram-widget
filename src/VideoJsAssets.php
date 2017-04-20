<?php

namespace michaeldomo\instashow;

use yii\web\AssetBundle;
use yii\web\JqueryAsset;

/**
 * Class VideoJsAssets
 * @package app\widgets\views\instagram\assets
 */
class VideoJsAssets extends AssetBundle
{
    public $sourcePath = '@bower/video.js';

    public $css = [
        '//vjs.zencdn.net/5.11/video-js.min.css',
    ];

    public $js = [
        '//vjs.zencdn.net/5.11/video.min.js',
    ];

    public $depends = [
        JqueryAsset::class
    ];
}
