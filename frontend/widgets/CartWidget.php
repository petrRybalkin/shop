<?php


namespace frontend\widgets;


use Yii;
use yii\base\Widget;
use yz\shoppingcart\ShoppingCart;

class CartWidget extends Widget
{
    public function run()
    {
        /** @var ShoppingCart $cart */
        $cart = Yii::$app->cart;

        return $this->render('cart', [
            'cart' => $cart,
        ]);
    }
}
