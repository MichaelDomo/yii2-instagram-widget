# Yii2 instagram simple widget

Simply implementation of instagram feed with user and limit parameters.
Also you can use widget.

## Installation:

```composer require michaeldomo/yii2-instagram-widget```

## How to use

Simply usage in Yii2:

Get feed public data:
```
$instagram = Yii::createObject(Instagram::class);
//There store all public data about user feed posts
//Get from https://www.instagram.com/{user}/media
$items = $instagram->get($this->channel, $this->limit);
//you can check data just print all
print_r($items);
```

Simply usage of widget in Yii2:

```
use app\widgets\InstagramWidget;
echo InstagramWidget::widget([
    'channel' => 'zuch',
    'limit' => 22,
]);
```

## Screenshots

![Image1](http://dl3.joxi.net/drive/2017/04/21/0005/2351/387375/75/8dafa8eb8e.png)
![Image2](http://dl4.joxi.net/drive/2017/04/21/0005/2351/387375/75/c26fcdb079.png)





