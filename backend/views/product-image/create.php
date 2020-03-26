<?php

use common\models\Product;
use common\models\ProductImage;
use yii\helpers\Html;
use yii\web\View;

/* @var $this View */
/* @var $product Product */
/* @var $model ProductImage */

$this->title = 'Добавить изображение для: ' . $product->title;
?>
<div class="product-image-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
