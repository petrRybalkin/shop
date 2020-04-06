<?php


namespace frontend\components;

use backend\models\Settings;
use common\models\Order;
use Exception;
use yii\base\Component;

class Telegram extends Component
{
    const URL_PREFIX = 'https://api.telegram.org/bot';

    /**
     * @var string
     */
    public $token;

    public function init()
    {
        if (!$this->token) {
            $this->token = Settings::getVal('telegramToken');
        }
        parent::init();
    }

    /**
     * @return string
     */
    public function getUrl()
    {
        return self::URL_PREFIX . $this->token;
    }

    /**
     * @param string $text
     * @param integer $chatId
     * @param string $parseMode ''|'markdown'|'html'
     * @return mixed
     */
    public function sendMessage($text, $chatId = null, $parseMode = '')
    {
        if(!$chatId = $chatId ?: Settings::getVal('chatId')) {
            return;
        }

        return $this->call('sendMessage', [
            'chat_id' => $chatId,
            'text' => $text,
            'parse_mode' => $parseMode,
            'disable_web_page_preview' => false,
            'reply_to_message_id' => 0,
            'reply_markup' => null,
            'disable_notification' => false,
        ]);
    }

    /**
     * Call method
     *
     * @param string $method
     * @param array|null $data
     *
     * @return mixed
     */
    public function call($method, array $data = null)
    {
        $options = [
            CURLOPT_URL => $this->getUrl() . '/' . $method,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_POST => null,
            CURLOPT_POSTFIELDS => null,
            CURLOPT_TIMEOUT => 5,
        ];

        if ($data) {
            $options[CURLOPT_POST] = true;
            $options[CURLOPT_POSTFIELDS] = $data;
        }

        return $this->executeCurl($options);
    }

    /**
     * curl_exec wrapper for response validation
     *
     * @param array $options
     *
     * @return string
     */
    protected function executeCurl(array $options)
    {
        $curl = curl_init();
        curl_setopt_array($curl, $options);

        return curl_exec($curl);
    }

    /**
     * @param Order $order
     * @param integer $chatId
     * @return mixed
     * @throws Exception
     */
    public function sendOrderMessage(Order $order, $chatId = null)
    {
        $headerText = "Заказ №{$order->id}
==================

";
        $orderText = "
------------- | -------------";
        foreach ($order->attributes as $attribute => $value) {
            if (in_array($attribute, ['status', 'user_id', 'updated_at'])) {
                continue;
            }
            $orderText .= ("\n" . $order->getAttributeLabel($attribute) . " | " . $value);
        }


        $oneC = [];
        $itemsText = "
        
        
Название | Вес | Цена | Кол-во
-------- | --- | ---- | ------";
        foreach ($order->orderItems as $orderItem) {
            $itemsText .= ("\n" . $orderItem->title . " | " . $orderItem->weight . " | " . $orderItem->price . " | " . $orderItem->amount);
            $oneC[] = "{$orderItem->product_1c_id}_{$orderItem->amount}";
        }

        $oneC = "

1C
===========

" . implode(" ", $oneC) . ' ;';

        return $this->sendMessage($headerText . $orderText . $itemsText . $oneC, $chatId);
    }
}
