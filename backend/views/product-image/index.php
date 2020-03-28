<?php

use common\models\Product;
use common\models\ProductImage;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $product Product */
/* @var $searchModel common\models\ProductImageSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Изображения для: ' . $product->title;
?>
<div class="product-image-index">

    <p>
        <?= Html::a('Добавить изображение', ['create', 'id' => $product->id], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
//            [
//                'attributes' => 'product_id',
//                'filter' => false,
//                ''
//            ],
            [
                'attribute' => 'image',
                'filter' => false,
                'format' => 'raw',
                'value' => function (ProductImage $model) {
                    return Html::img($model->getThumbFileUrl('image', 'thumb') . '?' . time());
                }
            ],
            [
                'attribute' => 'main',
                'filter' => [
                    0 => 'Нет',
                    1 => 'Да',
                ],
                'value' => function (ProductImage $model) {
                    return $model->main ? 'Да' : 'Нет';
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>

</div>
