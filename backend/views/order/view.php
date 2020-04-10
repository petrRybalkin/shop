<?php

use common\models\Order;
use common\models\OrderItem;
use yii\data\ArrayDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\web\View;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this View */
/* @var $model Order */

$this->title = "Заказ №{$model->id}. Покупатель {$model->name}";
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<div class="order-view">

    <div class="row">
        <div class="col-md-7">
            <?= GridView::widget([
                'dataProvider' => new ArrayDataProvider([
                    'allModels' => $model->orderItems,
                ]),
                'columns' => [
                    [
                        'header' => '',
                        'format' => 'raw',
                        'value' => function (OrderItem $model) {
                            return ($model->product && $model->product->image)
                                ? Html::img($model->product->image->getThumbFileUrl('image', 'thumb'))
                                : '';
                        }
                    ],
                    'title',
                    'weight',
                    'price',
                    'amount',
                ],
            ]) ?>
        </div>
        <div class="col-md-5">
            <?= DetailView::widget([
                'model' => $model,
                'attributes' => [
                    [
                        'attribute' => '',
                        'format' => 'raw',
                        'value' => '<h3>' . Html::tag('span', Yii::$app->formatter->asDecimal($model->getTotalPrice(), 2) . ' грн', [
                                'class' => 'label label-success'
                            ]) . '</h3>',
                    ],
                    [
                        'attribute' => 'status',
                        'format' => 'raw',
                        'value' => $model->getStatusTag(),
                    ],
                    'person_count',
                    'name',
                    'phone',
                    'address',
                    'price',
                    'delivery',
                    'description',
                    'created_at:datetime',
                    [
                        'attribute' => '',
                        'format' => 'raw',
                        'value' => function (Order $model, $widget) {
                            if (($nextStatus = $model->getNextStatus()) === null) {
                                return '';
                            }

                            return Html::a($model->getStatusLabel('-', $nextStatus),
                                    ['status', 'id' => $model->id, 'status' => $nextStatus], [
                                        'class' => 'btn btn-' . $model->getStatusColor('-', $nextStatus),
                                    ])
                                . '&nbsp;'
                                . Html::a($model->getStatusLabel('-', Order::STATUS_CANCEL),
                                    ['status', 'id' => $model->id, 'status' => Order::STATUS_CANCEL], [
                                        'class' => 'btn btn-' . $model->getStatusColor('-', Order::STATUS_CANCEL),
                                    ]);
                        },
                    ],
//            'updated_at',
                ],
            ]) ?>
        </div>
    </div>

</div>
