<?php

use common\models\Order;
use yii\grid\GridView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ваши заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index">

    <h1><?= $this->title ?></h1>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            [
                'attribute' => 'status',
                'filter' => Order::statusList(),
                'format' => 'raw',
                'value' => function (Order $model) {
                    return Html::a($model->getStatusTag([
                            'class' => 'hz hz-' . $model->getStatusColor(),
                    ]), ['view', 'id' => $model->id]);
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
        ],
    ]); ?>


</div>
