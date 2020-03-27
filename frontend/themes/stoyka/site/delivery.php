<?php

use common\models\Delivery;
use yii\web\View;
use yii\widgets\Breadcrumbs;

/**
 * @var $this View
 * @var $model Delivery
 */

$this->title = $model->seoTitle;
$this->registerMetaTag([
    'name' => 'description',
    'content' => $model->seoDescription,
]);

?>

<section class="static-page delivery">
    <div class="content">
        <div class="clear flatpage">
            <div class="breadcrumbs left">
                <ul>
                    <li><a href="/">Главная</a></li><li><?= $model->title ?></li>
                </ul>
            </div>
        </div>

        <p class="products__title"><?= $model->title ?></p>
        <div class="block clear">
            <?= $model->description ?>
        </div>
    </div>
</section>
