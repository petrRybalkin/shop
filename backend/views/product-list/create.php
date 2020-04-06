<?php

use common\models\ProductList;
use yii\web\View;

/* @var $this View */
/* @var $model ProductList */

$this->title = 'Создать список';
$this->params['breadcrumbs'][] = ['label' => 'Списки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-list-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
