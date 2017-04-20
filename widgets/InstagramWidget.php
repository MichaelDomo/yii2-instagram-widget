<?php

namespace app\widgets;

use Yii;
use yii\base\Widget;
use app\components\Instagram;

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
     * Thumb width and height, available 150, 320, 640, 1080x1080.
     * @var integer
     */
    public $thumbResolution;

    /**
     * Limit of items, default 20.
     * @var integer
     */
    public $limit = Instagram::DEFAULT_LIMIT;

    /**
     * @inheritdoc
     */
    public function run()
    {
        /** @var Instagram $instagram */
        $instagram = Yii::createObject(Instagram::class);
        $items = $instagram->get($this->channel, $this->limit);

        return $this->render('instagram/view', [
            'items' => $this->updateItems($items)
        ]);
    }

    /**
     * @param array $items
     * @return array
     */
    public function updateItems($items)
    {
        foreach ($items as $item) {

        }

        return $items;
    }
}
