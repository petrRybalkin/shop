<?php


use common\models\Order;
use common\models\OrderItem;
use common\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;
use yz\shoppingcart\ShoppingCart;

/**
 *
 * @var $cart ShoppingCart
 * @var $model Order
 */
$cart = Yii::$app->cart;
$token = $model::TELEGRAM_TOKEN;
$chatid = $model::TELEGRAM_CHATID;
$text = '
Имя заказчика:'. $model->name .'<br>
Телефон:'. $model->phone. '<br>
 Адрес:'. $model->address.'<br>
Сумма заказа:'. $model->name .'<br>
Комментарий:'.$model->description.'';

?>
<?php

message_to_telegram($text, $token, $chatid);

function message_to_telegram($text, $token, $chatid)
{
    $ch = curl_init();
    curl_setopt_array(
        $ch,
        array(
            CURLOPT_URL => 'https://api.telegram.org/bot' . $token . '/sendMessage',
            CURLOPT_POST => TRUE,
            CURLOPT_RETURNTRANSFER => TRUE,
            CURLOPT_TIMEOUT => 10,
            CURLOPT_POSTFIELDS => array(
                'chat_id' => $chatid,
                'text' => $text,
            ),
        )
    );
    curl_exec($ch);
}
?>