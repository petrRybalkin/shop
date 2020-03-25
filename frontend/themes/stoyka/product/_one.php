<?php

use common\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var $this yii\web\View
 * @var $product Product
 */
?>

<hr>

<a href="<?= Url::to(['URL_NA_TOVAR']) ?>">
    <h4><?= $product->title ?></h4>

    <?= Html::img($product->image ? $product->image->getThumbFileUrl('image', 'thumb') : 'DEFAULT IMAGE', [
        'alt' => $product->title,
        'title' => $product->title,
    ]) ?>
</a>

<p><?= $product->description ?></p>

<p>Цена: <?= Yii::$app->formatter->asDecimal($product->price) ?> грн</p>


<p>
    <a href="javascript:;" class="btn btn-success">Купить</a>
</p>
