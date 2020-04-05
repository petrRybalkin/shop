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

$this->title = "Заказ №{$model->id}";
$this->params['breadcrumbs'][] = [
    'label' => 'Ваши заказы',
    'url' => ['index'],
];
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
                        'value' => '<h3>' . Html::tag('span',
                                Yii::$app->formatter->asDecimal($model->getTotalPrice(), 2) . ' грн', [
                                    'class' => 'hz hz-success'
                                ]) . '</h3>',
                    ],
                    [
                        'attribute' => 'status',
                        'format' => 'raw',
                        'value' => $model->getStatusTag([
                            'class' => 'hz hz-' . $model->getStatusColor(),
                        ]),
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
                ],
            ]) ?>
        </div>
    </div>

</div>
