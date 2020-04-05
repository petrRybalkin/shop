<?php

namespace common\models;

use backend\models\Settings;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yz\shoppingcart\ShoppingCart;

/**
 * This is the model class for table "{{%order}}".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $name
 * @property string|null $phone
 * @property string|null $city
 * @property string|null $address
 * @property int|null $price
 * @property int|null $person_count
 * @property int $status
 * @property int|null $delivery
 * @property string|null $description
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property User $user
 * @property OrderItem[] $orderItems
 */
class Order extends ActiveRecord
{
    const STATUS_NEW = 0;
    const STATUS_ACCEPT = 1;
    const STATUS_DELIVER = 2;
    const STATUS_DONE = 3;
    const STATUS_CANCEL = -1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%order}}';
    }

    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            [
                'class' => TimestampBehavior::class,
                'value' => new Expression('NOW()'),
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [
                ['price'],
                function ($attribute, $params, $validator) {
                    if ($this->price <= 0) {
                        $this->addError('name', Yii::t('app', 'Please add some product to your cart'));
                    }
                }
            ],
//            [['delivery'], 'default', 'value' => Settings::calcDeliveryPrice()],
            [['status'], 'default', 'value' => self::STATUS_NEW],
            [['person_count'], 'default', 'value' => 1],
            [['status'], 'in', 'range' => array_keys(self::statusList())],
            [['user_id', 'price', 'delivery', 'status', 'person_count'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'city', 'address', 'description'], 'string', 'max' => 255],
            ['phone', 'string', 'max' => 255],
            [['name', 'phone', 'address'], 'required'],
            [['user_id'], 'default', 'value' => Yii::$app->user->id],
            [
                ['user_id'],
                'exist',
                'skipOnError' => true,
                'skipOnEmpty' => true,
                'targetClass' => User::class,
                'targetAttribute' => ['user_id' => 'id']
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', '№ заказа'),
            'status' => Yii::t('app', 'Статус'),
            'user_id' => Yii::t('app', 'User ID'),
            'name' => Yii::t('app', 'Заказчик'),
            'phone' => Yii::t('app', 'Телефон'),
            'city' => Yii::t('app', 'Город'),
            'address' => Yii::t('app', 'Адрес'),
            'price' => Yii::t('app', 'Стоимость'),
            'person_count' => Yii::t('app', 'Кол-во персон'),
            'delivery' => Yii::t('app', 'Стоимость доставки'),
            'description' => Yii::t('app', 'Описание'),
            'created_at' => Yii::t('app', 'Дата создания'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
    }

    public static function statusList()
    {
        return [
            self::STATUS_NEW => 'Оформлен',
            self::STATUS_ACCEPT => 'Принят в работу',
            self::STATUS_DELIVER => 'Отправлен',
            self::STATUS_DONE => 'Выполнен',
            self::STATUS_CANCEL => 'Отменен',
        ];
    }

    public static function statusColorList()
    {
        return [
            self::STATUS_NEW => 'primary',
            self::STATUS_ACCEPT => 'info',
            self::STATUS_DELIVER => 'warning',
            self::STATUS_DONE => 'success',
            self::STATUS_CANCEL => 'danger',
        ];
    }

    /**
     * @param string $default
     * @param null $status
     * @return string
     */
    public function getStatusLabel($default = '-', $status = null)
    {
        return ArrayHelper::getValue(self::statusList(), $status ?: $this->status, $default);
    }

    /**
     * @param string $default
     * @param null $status
     * @return string
     */
    public function getStatusColor($default = 'default', $status = null)
    {
        return ArrayHelper::getValue(self::statusColorList(), $status ?: $this->status, $default);
    }

    /**
     * @param array $options
     * @return string
     */
    public function getStatusTag($options = [])
    {
        if (!array_key_exists('class', $options)) {
            $options['class'] = 'label label-' . $this->getStatusColor();
        }
        return Html::tag('span', $this->getStatusLabel(), $options);
    }

    public function getNextStatus()
    {
        if (in_array((int)$this->status, [self::STATUS_DONE, self::STATUS_CANCEL], true)) {
            return null;
        }
        return $this->status + 1;
    }

    /**
     * Gets query for [[User]].
     *
     * @return ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }

    /**
     * Gets query for [[OrderItems]].
     *
     * @return ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::class, ['order_id' => 'id']);
    }

    public function saveItems()
    {
        if (!Yii::$app->user->isGuest) {
            /** @var Profile $profile */
            $profile = ArrayHelper::getValue(Yii::$app->user, 'identity.profile') ?: new Profile();
            $profile->name = $this->name;
            $profile->phone = $this->phone;
            $profile->city = $this->city;
            $profile->address = $this->address;
            $profile->save();
        }

        /** @var ShoppingCart $cart */
        $cart = Yii::$app->cart;

        /** @var Product $product */
        foreach ($cart->getPositions() as $product) {
            $item = new OrderItem();
            $item->product_id = $product->getId();
            $item->title = $product->title;
            $item->weight = $product->weight;
            $item->price = $product->price;
            $item->amount = $product->getQuantity();
            $this->link('orderItems', $item);
        }
    }

    public function getTotalPrice()
    {
        return $this->price + $this->delivery;
    }
}
