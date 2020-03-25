<?php

use yii\helpers\Html;
use yz\shoppingcart\ShoppingCart;

/**
 * @var $this yii\web\View
 * @var $cart ShoppingCart
 */

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h3 class="panel-title">
            <?= Html::a('Корзина в хеадере', ['/site/cart']) ?>
        </h3>
    </div>
    <div class="panel-body">
        <p>Картинка корзины</p>
        <p>Кол-во: <?= $cart->getCount() ?></p>
    </div>
</div>

