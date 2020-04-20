<?php
use yii\helpers\Html;
use yii\helpers\Url;
use yii\bootstrap\ActiveForm;
use kartik\rating\StarRating;
use common\models\Rating;
?>
<div id="rating-form">
    <?php $form = ActiveForm::begin([
        'id' => 'rating-form',
        'enableAjaxValidation' => false,
        'enableClientValidation' => false,
    ]); ?>
    <?= $form->field($model, 'rating')->label('')->widget(StarRating::classname(), [
        'pluginOptions' => [
            'label' => '123',
            'theme' => 'krajee-uni',
            'filledStar' => '&#x2605;',
            'step' => 0.1,
            'emptyStar' => '&#x2606;',
            'clearButton' => '',
            'disabled' => $disabled,
            //'displayOnly' => $displayOnly
        ],
        'pluginEvents' => [
        //когда кликаем на звезды всплывает это событие, которое и обробатываем
        'rating.change' => "function(event, value) {
            $.ajax({
                type: 'POST',
                url: '".Url::to()."',
                data: {'rating': value},
                cache: false,
                success: function(data) {
                    var data = jQuery.parseJSON(data);
                    var inputRating = $('#article-rating');
                    if (typeof data.message !== 'undefined') {
                        console.log(data.message);
                        inputRating.rating('reset');
                    }else{
                        inputRating.rating('refresh', {disabled: true});
                    }
                }
            });
        }",
        ],
    ]);
    ?>
    <?php ActiveForm::end(); ?>
</div>