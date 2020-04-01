<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\PasswordResetRequestForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Запрос на сброс пароля';
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
        <p>Пожалуйста введите Ваш Email. На него бует выслана ссылка для смены пароля:</p>
        <div class="block clear login-block">

             <?php $form = ActiveForm::begin(['id' => 'request-password-reset-form', 'class' => 'clear']); ?>

                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Отправить', ['class' => 'button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</section>
