<?php

use common\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;

/**
 * @var $this yii\web\View
 * @var $product Product
 */
?>

<hr>

<a href="<?= Url::to($product->getUrl()) ?>">
    <h4><?= $product->title ?></h4>

    <?= Html::img($product->image ? $product->image->getThumbFileUrl('image', 'thumb') : 'DEFAULT IMAGE', [
        'alt' => $product->title,
        'title' => $product->title,
    ]) ?>
</a>

<?= $product->description ?>

<p>Цена: <?= Yii::$app->formatter->asDecimal($product->price) ?> грн</p>

<p>Кол-во: при изменении добжен меняться параметр amount в ссылке ниже (кнопка купить)</p>

<p>
    <?= Html::a('Купить', [
        '/site/buy',
        'id' => $product->id,
        'amount' => 1,
    ], [
        'class' => 'btn btn-success'
    ]) ?>
</p>
