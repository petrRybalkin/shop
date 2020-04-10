<?php

use common\models\Order;
use frontend\assets\AppAsset;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\DetailView;

/**
 * @var $this View
 * @var $model Product
 */

$this->registerJsFile(Yii::getAlias('@web/js/site.js'), [
    'depends' => [
        AppAsset::class
    ],
    'position' => View::POS_READY,
]);
?>

<h3>Заказ #<?=$model->id ?></h3>

<?= DetailView::widget([
        'model' => $model,
        'attributes' => [
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
]) ?>

<hr>