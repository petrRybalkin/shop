<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Регистрация';
//$this->params['breadcrumbs'][] = $this->title;
?>


<section>
    <div class="content">
        <div class="clear">
            <div class="breadcrumbs left">
                <ul><li><a href="/">Главная</a></li><li><?= Html::encode($this->title) ?></li></ul>
            </div>
        </div>
        <p class="products__title"><?= Html::encode($this->title) ?></p>
        <p class="products__description hidden-xs-down">Если вы планируете совершать покупки на нашем сайте, предлагаем вам зарегистрироваться. Это в дальнейшем упростит процесс оформления заказа.</p>
        <div class="block clear login-block register">
            <?php $form = ActiveForm::begin(['id' => 'form-signup', 'class' => 'sign-up']); ?>
                <div class="clear">
                    <div class="left">
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true]) ?>
                    </div>
                    <div class="right">
                    <?= $form->field($model, 'email') ?>
                    </div>
                    <div class="left">
                    <?= $form->field($model, 'password')->passwordInput() ?>
                    </div>
                </div>
                
                <?= Html::submitButton('Регистрация', ['class' => 'button', 'name' => 'signup-button']) ?>
                <?= Html::a('У меня уже есть аккаунт', ['site/login']) ?>.
                <p style="margin-top: 20px;font-size: 16px;font-weight: 700;">Нажмимая кнопку "Регистрация", вы тем самым соглашаетесь с правилами обслуживания клиентов компании кафе "Стойка", порядком оказания услуг и информирования клиентов о заказах, новинках и проводимых акциях.</p>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</section>
