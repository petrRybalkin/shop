<?php

use yii\helpers\Html;
use yz\shoppingcart\ShoppingCart;

/**
 * @var $this yii\web\View
 * @var $cart ShoppingCart
 */

?>
  
<?= Html::a('', ['/site/cart'], ['class' => 'header-bottom__basket']) ?>
<span class="cart-count"><?= $cart->getCount() ?></span>


