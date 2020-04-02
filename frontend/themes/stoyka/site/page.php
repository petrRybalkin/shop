<?php

use common\models\Page;
use yii\web\View;

/**
 * @var $this View
 * @var $model Page
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
