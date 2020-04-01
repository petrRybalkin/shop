<?php

use common\models\Category;
use common\models\Product;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Товары';
?>
<div class="product-index">

    <p>
        <?= Html::a('Добавить товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'category_id',
                'filter' => Category::getParentsList(),
                'value' => function (Product $model) {
                    return $model->category->title;
                }
            ],
            'title',
            'weight',
            'description:html',
            'price',
            //'old_price',
            //'seoTitle',
            //'seoDescription:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {images} {delete}',
                'buttons' => [
                    'images' => function ($url, Product $model) {
                        return Html::a('<span class="glyphicon glyphicon-plus"></span>', ['/product-image/index', 'id' => $model->id], [
                            'title' => Yii::t('yii', 'Images'),
                        ]);
                    }
                ],
            ],
        ],
    ]); ?>

</div>
