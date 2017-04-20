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
     * Channel name (like "spylance", e.t.c).
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
        /** @var Instagram $instagram */
        $instagram = Yii::createObject(Instagram::class);
        $items = $instagram->get($this->channel, $this->limit);

        return $this->render('view', [
            'items' => $items
        ]);
    }
}
