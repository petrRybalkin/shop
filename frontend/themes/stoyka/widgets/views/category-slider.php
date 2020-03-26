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

<ul class="slider-category">
    <?php foreach ($categories as $category): ?>
        <li>
            <a href="<?= Url::to($category->getUrl()) ?>">
                <?= Html::img($category->getThumbFileUrl('image', 'thumb'), [
                    'alt' => $category->title,
                    'title' => $category->title,
                ]) ?>
                <p><?= $category->title ?></p>
            </a>
        </li>
    <?php endforeach; ?>
</ul>
