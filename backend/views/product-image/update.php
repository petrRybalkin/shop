<?php

use common\models\Product;
use common\models\ProductImage;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $product Product */
/* @var $model ProductImage */

$this->title = 'Изменить ихображение для : ' . $product->title;
?>
<div class="product-image-update">

    <?= Html::img($model->getImageFileUrl('image') . '?' . time(), [
        'class' => 'img-thumbnail',
    ]) ?>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
