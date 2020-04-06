<?php

use common\models\ProductList;
use yii\web\View;

/* @var $this View */
/* @var $model ProductList */

$this->title = 'Редактирование списка: ' . $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Списки', 'url' => ['index']];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="product-list-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
