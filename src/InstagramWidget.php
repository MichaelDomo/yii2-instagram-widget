<?php

namespace michaeldomo\instashow;

use Yii;
use yii\base\Widget;

/**
 * Class Instagram
 * @package app\widgets
 */
class InstagramWidget extends Widget
{
    /**
     * Channel name.
     * @var string
     */
    public $channel;

    /**
     * Limit of items, default 20.
     * @var integer
     */
    public $limit = Instagram::DEFAULT_LIMIT;

    /**
     * @inheritdoc
     */
    public function init()
    {
        InstagramAssets::register($this->view);
        parent::init();
    }

    /**
     * @inheritdoc
     */
    public function run()
    {
        $cache = Yii::$app->cache;
        $key = [
            self::class,
            $this->channel . '-' . $this->limit,
        ];

        $items = $cache->getOrSet($key, function () {
            /** @var Instagram $instagram */
            $instagram = Yii::createObject(Instagram::class);
            return $instagram->get($this->channel, $this->limit);
        }, 72000);

        return $this->render('view', [
            'items' => $items
        ]);
    }
}
