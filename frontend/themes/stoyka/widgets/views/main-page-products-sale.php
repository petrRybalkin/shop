<?php

use common\models\Category;
use common\models\Product;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\ListView;

/**
 * @var $this yii\web\View
 * @var $model Product[]
 */
$model = new Product();
?>

<div class="products" id="cat-akcii">
    <p class="products__title">Акции</p>
    <span class="products__description products__description--cat-akcii"></span>
    <ul class="list-product clear five None list-cat-cat-akcii wok-product-list-">
        <?= ListView::widget([
            'summary' => false,
            'itemView' => '//product/_one',
            'dataProvider' => new ArrayDataProvider([
                'allModels' =>  $model->getProductsSale()->all(),
                'pagination' => false,
            ]),
            'itemOptions' => [
                'tag' => false,
            ],
        ]) ?>
    </ul>
</div>
