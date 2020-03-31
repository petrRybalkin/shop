<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Сброс пароля';
?>

<section>
    <div class="content">
        <div class="clear">
            <div class="breadcrumbs left">
                <ul>
                    <li><a href="/">Главная</a></li><li><?= Html::encode($this->title) ?></li>
                </ul>
            </div>
        </div>
        <p class="products__title"><?= Html::encode($this->title) ?></p>
        <p>Пожалуйста ввведите новый пароль:</p>
        <div class="block clear login-block">

            <?php $form = ActiveForm::begin(['id' => 'reset-password-form', 'class' => 'clear']); ?>

                <?= $form->field($model, 'password')->passwordInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Сохранить', ['class' => 'button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</section>