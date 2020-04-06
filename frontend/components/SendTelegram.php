<?php


namespace frontend\components;

use Yii;
use yii\base\Component;
use yii\helpers\Html;
use yii\helpers\Json;

class SendTelegram extends Component
{
    public $token, $chatID;

    function message_to_telegram($text)
    {
        $ch = curl_init();
        curl_setopt_array(
            $ch,
            array(
                CURLOPT_URL => 'https://api.telegram.org/bot' . $this->token . '/sendMessage',
                CURLOPT_POST => TRUE,
                CURLOPT_RETURNTRANSFER => TRUE,
                CURLOPT_TIMEOUT => 10,
                CURLOPT_POSTFIELDS => array(
                    'chat_id' => $this->chatID,
                    'text' => $text,
                ),
            )
        );
        curl_exec($ch);
    }
}