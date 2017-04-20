<?php

namespace app\components;

use app\helpers\InstagramHelper;
use yii\base\Component;
use yii\helpers\ArrayHelper;
use yii\helpers\Json;
use yii\httpclient\Client;

/**
 * Simply implementation of instagram feed with user and limit parameters.
 * Also you can use widget based on WordPress instashow template (I stole css and js from off site).
 *
 * Simply usage in Yii2:
 *
 * <?php
 * $instagram = Yii::createObject(Instagram::class);
 * //There store all public data about user feed posts
 * //Get from https://www.instagram.com/{user}/media
 * $items = $instagram->get($this->channel, $this->limit);
 * //you can check data just print all
 * print_r($items);
 * ?>
 *
 * Simply usage of widget in Yii2:
 *
 * use app\widgets\InstagramWidget;
 * echo InstagramWidget::widget([
 *     'channel' => 'spylance',
 *     'limit' => 1,
 *     //Soon
 *     'thumbResolution' => 1080
 * ]);
 *
 * @package app\components
 */
class Instagram extends Component
{
    /**
     * Default limit of items that returns instagram.
     * @var integer
     */
    const DEFAULT_LIMIT = 20;

    /**
     * @var Client
     */
    private $client;

    /**
     * Instagram constructor.
     *
     * @param Client $client
     * @param array $config
     */
    public function __construct(Client $client, $config = [])
    {
        $this->client = $client;
        parent::__construct($config);
    }

    /**
     * Fetch the media items.
     * @param string $user
     * @param integer $limit
     * @return array
     */
    public function get($user, $limit)
    {
        if ($limit <= self::DEFAULT_LIMIT) {
            return InstagramHelper::arraySplice($this->getResult($user)->items, $limit);
        }
        return $this->getOverLimit($user, $limit - self::DEFAULT_LIMIT);
    }

    /**
     * Вынес чтобы не мешалось всё в одном методе.
     *
     * @param string $user
     * @param int $limit
     * @return array
     */
    private function getOverLimit($user, $limit)
    {
        $requestData = $this->getResult($user);
        $result = $items = $requestData->items;
        $moreAvailable = $requestData->more_available;

        while ($limit > 0) {
            if (1 != $moreAvailable) {
                break;
            }
            end($items);
            $requestData = $this->getResult($user, $items[key($items)]->id);
            $items = $requestData->items;
            $moreAvailable = $requestData->more_available;
            if ($limit <= self::DEFAULT_LIMIT) {
                $result = ArrayHelper::merge($result, InstagramHelper::arraySplice($items, $limit));
                break;
            } else {
                $result = ArrayHelper::merge($result, $items);
            }
            $limit -= self::DEFAULT_LIMIT;
        }

        return $result;
    }

    /**
     * @param string $user
     * @param string $lastId
     * @return array|mixed
     * @throws \Exception
     */
    private function getResult($user, $lastId = '')
    {
        try {
            $url = sprintf('https://www.instagram.com/%s/media', $user) . '?max_id=' . $lastId;
            $response = $this->client->get($url)->send();
            return Json::decode($response->getContent(), false);
        } catch (\Exception $e) {
            throw new \Exception(sprintf('The user [%s] was not found.', $user));
        }
    }
}
