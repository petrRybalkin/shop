<?php

use common\models\Product;
use yii\helpers\Html;

/**
 * @var $this yii\web\View
 * @var $model Product
 */

$model->seo();

?>

<h1><?= $model->title ?></h1>

<h2>Главная картинка</h2>
<?php if($model->image): ?>
    <?= Html::img($model->image->getImageFileUrl('image'), [
        'class' => 'img-thumbnail',
    ]) ?>
<?php endif; ?>

<h2>Все картинки большие</h2>
<?php foreach($model->images as $image): ?>
    <?= Html::img($image->getImageFileUrl('image'), [
        'class' => 'img-thumbnail',
    ]) ?>
<?php endforeach; ?>

<h2>Все картинки маленькие</h2>
<?php foreach($model->images as $image): ?>
    <?= Html::img($image->getThumbFileUrl('image', 'thumb'), [
        'class' => 'img-thumbnail',
    ]) ?>
<?php endforeach; ?>


<?= $model->description ?>


<p>Цена: <?= Yii::$app->formatter->asDecimal($model->price) ?> грн</p>
<p>Старая цена: <?= Yii::$app->formatter->asDecimal($model->old_price) ?> грн</p>

<p>Кол-во: при изменении добжен меняться параметр amount в ссылке ниже (кнопка купить)</p>

<p>
    <?= Html::a('Купить', [
        '/site/buy',
        'id' => $model->id,
        'amount' => 1,
    ], [
        'class' => 'btn btn-success'
    ]) ?>
</p>
