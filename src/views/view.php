<?php

use michaeldomo\instashow\InstagramHelper;
use yii\helpers\StringHelper;

/** @var array|object $items */
?>
<div class="instashow">
    <div class="instashow-gallery">
        <div class="instashow-gallery-container">
            <div class="instashow-slider instashow-gallery-view instashow-gallery-view-active">
                <?php foreach ($items as $item) : ?>
                    <?php if ($item->type === 'video') : ?>
                        <div class="instashow-gallery-media instashow-gallery-media-square instashow-gallery-media-album instashow-gallery-media-video instashow-gallery-media-loaded">
                    <?php else : ?>
                        <div class="instashow-gallery-media instashow-gallery-media-square instashow-gallery-media-loaded">
                    <?php endif ; ?>
                        <a class="instashow-gallery-media-link" href="<?= $item->link; ?>" target="_blank"
                           data-media-id="<?= $item->id; ?>">
                            <span class="instashow-gallery-media-cover"></span>
                            <div>
                                <span class="instashow-gallery-media-info">
                                    <span class="instashow-gallery-media-info-counter">
                                        <span class="instashow-icon instashow-icon-like"></span>
                                        <em><?= $item->likes->count; ?></em>
                                    </span>
                                    <span class="instashow-gallery-media-info-counter">
                                        <span class="instashow-icon instashow-icon-comment"></span>
                                        <em><?= $item->comments->count; ?></em>
                                    </span>
                                    <span class="instashow-gallery-media-info-description">
                                        <?= StringHelper::truncate($item->caption->text, 120, '...'); ?>
                                    </span>
                                </span>
                            </div>
                            <span class="instashow-gallery-media-image">
                                <img src="<?= $item->images->standard_resolution->url; ?>"
                                     alt="<?= $item->caption->text; ?>">
                            </span>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <div class="instashow-popup instashow-show">
        <div class="instashow-popup-twilight"></div>
        <div class="instashow-popup-wrapper">
            <div class="instashow-popup-container">
                <div class="instashow-popup-control-close"></div>
                <div class="instashow-popup-control-arrow instashow-popup-control-arrow-previous">
                    <span></span>
                </div>
                <div class="instashow-popup-control-arrow instashow-popup-control-arrow-next">
                    <span></span>
                </div>
                <?php foreach ($items as $key => $item) : ?>
                    <div data-media-id="<?= $item->id; ?>"
                         class="instashow-popup-media instashow-popup-media-has-comments instashow-popup-media-square">
                        <?php if ($item->type === 'video') : ?>
                            <figure class="instashow-popup-media-picture instashow-popup-media-video instashow-popup-media-picture-loaded">
                                <video poster="<?= $item->images->standard_resolution->url ?>"
                                       src="<?=$item->videos->standard_resolution->url ?>"
                                       preload="false" loop="" webkit-playsinline="">
                                </video>
                            </figure>
                        <?php else : ?>
                            <figure class="instashow-popup-media-picture instashow-popup-media-picture-loaded">
                                <img src="<?= $item->images->standard_resolution->url; ?>"
                                     alt="<?= $item->caption->text; ?>">
                            </figure>
                        <?php endif; ?>
                        <div class="instashow-popup-media-info">
                            <div class="instashow-popup-media-info-origin">
                                <a href="//instagram.com/<?= $item->user->username ?>" target="_blank" rel="nofollow"
                                   class="instashow-popup-media-info-author">
                                    <span class="instashow-popup-media-info-author-picture">
                                        <img src="<?= $item->user->profile_picture ?>" alt="">
                                    </span>
                                    <span class="instashow-popup-media-info-author-name">
                                        <?= $item->user->full_name ?>
                                    </span>
                                </a>
                                <a href="<?= $item->link ?>" target="_blank" rel="nofollow"
                                   class="instashow-popup-media-info-original">
                                    <?= Yii::t('instashow', 'See on Instagram') ?>
                                </a>
                            </div>
                            <div class="instashow-popup-media-info-meta">
                                <div class="instashow-popup-media-info-properties">
                                    <span class="instashow-popup-media-info-properties-item">
                                        <span class="instashow-icon instashow-icon-like"></span>
                                        <em><?= $item->likes->count ?></em>
                                    </span>
                                    <span class="instashow-popup-media-info-properties-item">
                                        <span class="instashow-icon instashow-icon-comment"></span>
                                        <em><?= $item->comments->count ?></em>
                                    </span>
                                    <span class="instashow-popup-media-info-properties-item-location instashow-popup-media-info-properties-item">
                                        <span class="instashow-icon instashow-icon-placemark"></span>
                                        <em>
                                            <?= isset($item->location->name) ?
                                                $item->location->name :
                                                Yii::t('instashow', 'Not set'); ?>
                                        </em>
                                    </span>
                                </div>
                                <div class="instashow-popup-media-info-passed-time">
                                    <?= '' ?>
                                </div>
                            </div>
                            <div class="instashow-popup-media-info-content">
                                <div class="instashow-popup-media-info-description">
                                    <a href="//instagram.com/<?= $item->user->username ?>"
                                       target="_blank" rel="nofollow">
                                        <?= $item->user->full_name ?>
                                    </a>
                                    <?= InstagramHelper::wrapHashTags($item->caption->text); ?>
                                </div>
                                <div class="instashow-popup-media-info-comments">
                                    <?php foreach ($item->comments->data as $comment) : ?>
                                        <div class="instashow-popup-media-info-comments-item">
                                            <a href="//instagram.com/<?= $comment->from->username ?>"
                                               target="blank" rel="nofollow">
                                                <?= $comment->from->username ?>
                                            </a>
                                            <?= InstagramHelper::wrapHashTags($comment->text) ?>
                                        </div>
                                    <?php endforeach; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</div>
