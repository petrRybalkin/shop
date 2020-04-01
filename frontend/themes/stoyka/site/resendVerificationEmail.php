<?php
/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\ResetPasswordForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Запрос на верификацию Email';
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
        <p>Пожалуйста, введите вашу электронную почту. Письмо с подтверждением будет отправлено туда.</p>
        <div class="block clear login-block">

            <?php $form = ActiveForm::begin(['id' => 'resend-verification-email-form', 'class' => 'clear']); ?>

                <?= $form->field($model, 'email')->textInput(['autofocus' => true]) ?>

                <div class="form-group">
                    <?= Html::submitButton('Отправить', ['class' => 'button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</section>
