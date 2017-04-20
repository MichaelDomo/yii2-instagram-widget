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

        return $this->createTemplate($items);
    }

    /**
     * @param array $items
     * @return string
     */
    public function createTemplate($items)
    {
        $result = '<ul class="grid">';
        foreach ($items as $media) {
            $content = '<li>';
            //image or video
            if ($media->type === 'video') {
                $poster = $media->images->low_resolution->url;
                $source = $media->videos->standard_resolution->url;
                $content .= "<video class=\"media video-js vjs-default-skin\" width=\"250\" height=\"250\" 
                                poster=\"{$poster}\" data-setup='{\"controls\":true, \"preload\": \"auto\"}'>
                                    <source src=\"{$source}\" type=\"video/mp4\" />
                            </video>";
            } else {
                $image = $media->images->low_resolution->url;
                $content .= "<img class=\"media\" src=\"{$image}\"/>";
            }
            // create meta section
            $avatar = $media->user->profile_picture;
            $username = $media->user->username;
            $comment = (!empty($media->caption->text)) ? $media->caption->text : '';
            $content .= "<div class=\"content\">
                            <div class=\"avatar\" style=\"background-image: url({$avatar})\"></div>
                            <p>{$username}</p>
                            <div class=\"comment\">{$comment}</div>
                        </div>";
            // output media
            $content .= '</li>';
            $result .= $content;
        }

        return $result . '<ul>';
    }
}
