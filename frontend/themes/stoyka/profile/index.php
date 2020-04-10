<?php

use common\models\Order;
use common\models\OrderItem;
use yii\grid\GridView;
use yii\widgets\ListView;
use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $searchModel common\models\OrderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ваши заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-index visible-md visible-lg">

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
            'address',
            'price',
            'delivery',
            'description',
            'created_at:datetime',
            //'updated_at',
        ],
    ]); ?>


</div>


<div class="order-index visible-sm visible-xs">

    <h1><?= $this->title ?></h1>

    <?= ListView::widget([
        'itemView' => '_mobile',
        'dataProvider' => $dataProvider,
        'itemOptions' => [
        'tag' => false,
        ],
    ]) ?>
    
</div>
