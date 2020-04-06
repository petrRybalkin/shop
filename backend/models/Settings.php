<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yz\shoppingcart\ShoppingCart;

class Settings extends Model
{
    public $siteName;
    public $siteDescription;

    public $deliveryPrice;
    public $deliveryMin;

    public $chatId;
    public $telegramToken;

    public function rules()
    {
        return [
            [['siteName', 'siteDescription', 'telegramToken'], 'string'],
            [['deliveryPrice', 'deliveryMin', 'chatId'], 'integer'],
        ];
    }

    public function beforeValidate()
    {
        $this->siteName = (string) $this->siteName;
        $this->siteDescription = (string) $this->siteDescription;
        $this->telegramToken = (string) $this->telegramToken;
        $this->deliveryPrice = (int) $this->deliveryPrice;
        $this->deliveryMin = (int) $this->deliveryMin;
        $this->chatId = (int) $this->chatId;
        return parent::beforeValidate();
    }

    public function fields()
    {
        return ['siteName', 'siteDescription', 'deliveryPrice', 'deliveryMin', 'chatId', 'telegramToken'];
    }

    public function attributes()
    {
        return ['siteName', 'siteDescription', 'deliveryPrice', 'deliveryMin', 'chatId', 'telegramToken'];
    }

    public function attributeLabels()
    {
        return [
            'siteName' => 'Заголовок сайта',
            'siteDescription' => 'Описание сайта',
            'deliveryPrice' => 'Стоимость доставки, грн',
            'deliveryMin' => 'Бесплатная доставка при заказе от, грн',
            'chatId' => 'Telegram ID',
            'telegramToken' => 'Telegram Token',
        ];
    }

    public static function calcDeliveryPrice()
    {
        /** @var ShoppingCart $cart */
        $cart = Yii::$app->cart;

        $deliveryMin = self::calcDeliveryMin();
        if ($deliveryMin <= $cart->getCost()) {
            return 0;
        }
        return self::getSettings()->get('deliveryPrice', 'Settings');
    }

    public static function calcDeliveryMin()
    {
        return self::getSettings()->get('deliveryMin', 'Settings');
    }

    /**
     * @return \pheme\settings\components\Settings
     */
    public static function getSettings()
    {
        return Yii::$app->settings;
    }

    public static function getVal($key, $section = 'Settings')
    {
        return self::getSettings()->get($key, $section);
    }

    public static function seo()
    {
        $view = Yii::$app->view;
        $view->title = self::getVal('siteName');
        $view->registerMetaTag([
            'name' => 'description',
            'content' => self::getVal('siteDescription'),
        ]);
    }
}
