# Yii2 instagram simple widget

Simply implementation of instagram feed with user and limit parameters.

You can use it for getting public data from someone instagram account.

Also you can use widget(It looks like WordPress InstaShow).

## Installation:

```composer require michaeldomo/yii2-instagram-widget "dev-master"```

or add in require section in composer.json

```"michaeldomo/yii2-instagram-widget": "dev-master"```

## How to use

Simply usage in Yii2:

Get feed public data:
```
use michaeldomo\instashow\Instagram;

$instagram = Yii::createObject(Instagram::class);
//or $instagram = new Instagram();

//There store all public data about user feed posts
//Get from https://www.instagram.com/{user}/media
$items = $instagram->get($channel, $limit);

//you can check data just print all
print_r($items);
```

Simply usage of widget:

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





