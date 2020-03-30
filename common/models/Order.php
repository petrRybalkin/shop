<?php

namespace common\models;

use backend\models\Settings;
use Yii;
use yii\behaviors\TimestampBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\Expression;
use yii\helpers\ArrayHelper;
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
            [['delivery'], 'default', 'value' => Settings::calcDeliveryPrice()],
            [['user_id', 'price', 'delivery'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'phone', 'city', 'address', 'description'], 'string', 'max' => 255],
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
            'id' => Yii::t('app', 'ID'),
            'user_id' => Yii::t('app', 'User ID'),
            'name' => Yii::t('app', 'Name'),
            'phone' => Yii::t('app', 'Phone'),
            'city' => Yii::t('app', 'City'),
            'address' => Yii::t('app', 'Address'),
            'price' => Yii::t('app', 'Price'),
            'delivery' => Yii::t('app', 'Delivery price'),
            'description' => Yii::t('app', 'Description'),
            'created_at' => Yii::t('app', 'Created At'),
            'updated_at' => Yii::t('app', 'Updated At'),
        ];
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

    public function afterSave($insert, $changedAttributes)
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
        return parent::afterSave($insert, $changedAttributes);
    }
}
