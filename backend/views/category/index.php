<?php

use common\models\Category;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel common\models\CategorySearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Категории';
?>
<div class="category-index">

    <p>
        <?= Html::a('Добавить категорию', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'image',
                'format' => 'raw',
                'filter' => false,
                'value' => function (Category $model) {
                    return Html::img($model->getThumbFileUrl('image', 'thumb'));
                }
            ],
            [
                'attribute' => 'show_in_main',
                'filter' => [
                    0 => 'Нет',
                    1 => 'Да',
                ],
                'value' => function (Category $model) {
                    return $model->show_in_main ? 'Да' : 'Нет';
                }
            ],
//            'parent_id',
            'title',
            'description:ntext',
//            'seoTitle',
            //'seoDescription:ntext',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
