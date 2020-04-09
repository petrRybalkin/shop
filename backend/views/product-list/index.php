<?php

use common\models\ProductList;
use common\models\ProductListSearch;
use yii\data\ActiveDataProvider;
use yii\helpers\Html;
use yii\grid\GridView;
use yii\web\View;

/* @var $this View */
/* @var $searchModel ProductListSearch */
/* @var $dataProvider ActiveDataProvider */

$this->title = 'Списики';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-list-index">

    <p>
        <?= Html::a('Добавить список', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [

//            'id',
            'title',
            [
                'header' => '',
                'format' => 'raw',
                'value' => function(ProductList $model) {
                    return $model->getHtmlItems();
                }
            ],
            'required',
            'max_attributes',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{update} {delete}'
            ],
        ],
    ]); ?>


</div>
