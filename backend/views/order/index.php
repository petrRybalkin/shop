<?php

use common\models\Order;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'status',
                'filter' => Order::statusList(),
                'format' => 'raw',
                'value' => function (Order $model) {
                    return Html::a($model->getStatusTag(), ['view', 'id' => $model->id]);
                }
            ],
//            'user_id',
            'person_count',
            'name',
            'phone',
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
