<?php

namespace common\models;

use common\components\gd\ImageUploadBehavior;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yz\shoppingcart\CartPositionInterface;
use yz\shoppingcart\CartPositionTrait;

/**
 * This is the model class for table "product_list_item".
 *
 * @property int $id
 * @property int|null $list_id
 * @property int|null $product_1c_id
 * @property int|null $sort
 * @property string|null $title
 * @property string|null $image
 * @property int|null $price
 *
 * @property ProductList $list
 *
 * @mixin ImageUploadBehavior
 * @mixin CartPositionTrait
 */
class ProductListItem extends ActiveRecord implements CartPositionInterface
{
    use CartPositionTrait;

    public function behaviors()
    {
        return [
            [
                'class' => ImageUploadBehavior::class,
                'attribute' => 'image',
                'thumbs' => [
                    'thumb' => ['width' => 130, 'height' => 119],
                ],
                'filePath' => '@webroot/images/list-item/[[pk]].[[extension]]',
                'fileUrl' => '/images/list-item/[[pk]].[[extension]]',
                'thumbPath' => '@webroot/images/list-item/[[profile]]_[[pk]].[[extension]]',
                'thumbUrl' => '/images/list-item/[[profile]]_[[pk]].[[extension]]',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_list_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['list_id', 'price', 'sort', 'product_1c_id'], 'integer'],
            ['image', 'file', 'extensions' => 'jpeg, jpg, gif, png'],
            [['title'], 'string', 'max' => 255],
            [
                ['list_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => ProductList::class,
                'targetAttribute' => ['list_id' => 'id']
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'list_id' => 'List ID',
            'product_1c_id' => '1C ID',
            'sort' => 'Sort',
            'title' => 'Title',
            'image' => 'Image',
            'price' => 'Price',
        ];
    }

    /**
     * Gets query for [[List]].
     *
     * @return ActiveQuery
     */
    public function getList()
    {
        return $this->hasOne(ProductList::class, ['id' => 'list_id']);
    }

    /**
     * @inheritDoc
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @inheritDoc
     */
    public function getId()
    {
        return "add_{$this->id}";
    }
}
