<?php

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;

$this->title = 'Настройки';
?>


<?php $form = ActiveForm::begin(['id' => 'site-settings-form']); ?>

<?= $form->field($model, 'siteName') ?>
<?= $form->field($model, 'siteDescription')->textarea() ?>
    <hr>
<?= $form->field($model, 'deliveryPrice') ?>
<?= $form->field($model, 'deliveryMin') ?>

<?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>

<?php ActiveForm::end(); ?>
