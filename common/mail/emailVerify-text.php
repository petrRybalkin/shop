<?php

/* @var $this yii\web\View */
/* @var $user common\models\User */

$verifyLink = Yii::$app->urlManager->createAbsoluteUrl(['site/verify-email', 'token' => $user->verification_token]);
?>
Добрый день, <?= $user->username ?>,

Для подтверждения вашего email перейдите по ссылке ниже:

<?= $verifyLink ?>
