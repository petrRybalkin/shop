<?php

use frontend\widgets\CartWidget;
use frontend\widgets\CategorySliderWidget;
use frontend\widgets\MainPageProductsWidget;

/* @var $this yii\web\View */

$this->title = 'Bar Stoyka';

?>
<div class="site-index">

    <?= CategorySliderWidget::widget() ?>
    <?= CartWidget::widget() ?>
    <?= MainPageProductsWidget::widget() ?>

</div>
