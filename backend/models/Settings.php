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

    public function rules()
    {
        return [
            [['siteName', 'siteDescription'], 'string'],
            [['deliveryPrice', 'deliveryMin'], 'integer'],
        ];
    }

    public function beforeValidate()
    {
        $this->deliveryPrice = (int) $this->deliveryPrice;
        $this->deliveryMin = (int) $this->deliveryMin;
        return parent::beforeValidate();
    }

    public function fields()
    {
        return ['siteName', 'siteDescription', 'deliveryPrice', 'deliveryMin'];
    }

    public function attributes()
    {
        return ['siteName', 'siteDescription', 'deliveryPrice', 'deliveryMin'];
    }

    public function attributeLabels()
    {
        return [
            'siteName' => 'Заголовок сайта',
            'siteDescription' => 'Описание сайта',
            'deliveryPrice' => 'Стоимость доставки, грн',
            'deliveryMin' => 'Бесплатная доставка при заказе от, грн',
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

    public static function seo()
    {
        $view = Yii::$app->view;
        $view->title = self::getSettings()->get('siteName', 'Settings');
        $view->registerMetaTag([
            'name' => 'description',
            'content' => self::getSettings()->get('siteDescription', 'Settings'),
        ]);
    }
}
