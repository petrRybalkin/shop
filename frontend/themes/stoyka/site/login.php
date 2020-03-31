<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Вход на сайт';
$this->params['breadcrumbs'][] = $this->title;
?>


<section>
    <div class="content">
        <!-- <div class="clear">
            <div class="breadcrumbs left">
                <ul>
                    <li><a href="/">Главная</a></li><li><?//= Html::encode($this->title) ?></li>
                </ul>
            </div>
        </div> -->
        <p class="products__title"><?= Html::encode($this->title) ?></p>
        <div class="block clear login-block">
            <?php $form = ActiveForm::begin(['id' => 'login-form', 'class' => 'clear']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>

                <?= $form->field($model, 'password')->passwordInput() ?>

                <div class="login-checkbox clear">
                    <?= $form->field($model, 'rememberMe')->checkbox()->label('Запомнить меня') ?>
                </div>
                <?= Html::a('Забыли пароль?', ['site/request-password-reset']) ?>.

                <div style="color:#999;margin:1em 0;text-align:center">
                    Забыли подтвердить email? <?= Html::a('Отправить повторно', ['site/resend-verification-email']) ?>
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Войти', ['class' => 'button', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</section>
