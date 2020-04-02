<?php

use backend\models\Settings;
use common\models\Slider;
use frontend\widgets\MainPageProductsWidget;
use frontend\widgets\MainPageDiscriptionWidget;
use frontend\widgets\SliderWidget;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */

Settings::seo();
?>

<?= SliderWidget::widget([
    'place' => Slider::PLACE_MAIN_TOP,
]) ?>

<?= MainPageProductsWidget::widget() ?>

</div>
<section style="margin-top: 70px;">
    <?= MainPageDiscriptionWidget::widget() ?>
</section>
