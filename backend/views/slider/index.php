<?php

use common\models\Slider;
use common\models\SliderSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;
use yii\widgets\Pjax;

/* @var $this View */
/* @var $searchModel SliderSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'Sliders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="slider-index">

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'image',
                'filter' => false,
                'format' => 'raw',
                'value' => function (Slider $model) {
                    return Html::img($model->getThumbFileUrl('image', 'pr'));
                }
            ],
            'url',
            [
                'attribute' => 'place',
                'filter' => Slider::placeList(),
                'value' => function (Slider $model) {
                    return $model->placeLabel();
                }
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}',
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
