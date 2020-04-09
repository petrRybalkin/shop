<?php

use common\models\UserSearch;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

тут!
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'status',
                'filter' => UserSearch::statusList(),
                'format' => 'raw',
                'value' => function (UserSearch $model) {
                    return Html::a($model->getStatusTag(), ['view', 'id' => $model->id]);
                }
            ],
            'person_count',
            'name',
            'phone',
            'city',
            'address',
            'price',
            'delivery',
            'description',
            'created_at:datetime',
            //'updated_at',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}',
            ],
        ],
    ]); ?>


</div>
