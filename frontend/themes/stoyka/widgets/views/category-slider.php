<?php

use common\models\Category;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var $this yii\web\View
 * @var $categories Category[]
 */

?>

<!--<h3>Это слайдер категорий</h3>-->
<div class="cat-nav swiper-container hidden-sm-down">
    <div class="swiper-wrapper">
    <?php foreach ($categories as $category): ?>
        <div class="swiper-slide swiper-slide-active" style="width: 58.9286px; margin-right: 30px;">
            <a href="<?= Url::to($category->getUrl()) ?>" class=" big-menu-top-10 js-scroll-to-cat-desktop" style="background-image: url('<?=$category->getThumbFileUrl('image', 'thumb');?>')" data-url="<?= Url::to($category->getUrl()) ?>" data-hash="#cat-<?=$category->id; ?>"><?= $category->title ?></a>
            </div>
    <?php endforeach; ?>
    </div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>

