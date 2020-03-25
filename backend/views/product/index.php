<?php

use common\models\Product;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'category_id',
            'title',
            'description:ntext',
            'price',
            //'old_price',
            //'seoTitle',
            //'seoDescription:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {images} {delete}',
                'buttons' => [
                    'images' => function ($url, Product $model) {
                        return Html::a('<span class="glyphicon glyphicon-plus"></span>', ['image', 'id' => $model->id], [
                            'title' => Yii::t('yii', 'Images'),
                        ]);
                    }
                ],
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
