<?php

use backend\models\Settings;
use frontend\widgets\MainPageProductsWidget;
use frontend\widgets\MainPageDiscriptionWidget;
use frontend\widgets\MainPageProductsSaleWidget;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */

Settings::seo();
?>

<?= MainPageProductsSaleWidget::widget() ?>
<?= MainPageProductsWidget::widget() ?>

</div>
<section style="margin-top: 70px;">
    <?= MainPageDiscriptionWidget::widget() ?>
</section>
