<?php

namespace common\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yz\shoppingcart\CartPositionInterface;
use yz\shoppingcart\CartPositionTrait;

/**
 * This is the model class for table "product".
 * @see https://github.com/omnilight/yii2-shopping-cart
 *
 * @property int $id
 * @property int|null $category_id
 * @property string|null $title
 * @property string|null $description
 * @property int|null $price
 * @property int|null $old_price
 * @property string|null $seoTitle
 * @property string|null $seoDescription
 *
 * @property Category $category
 * @property ProductImage[] $images
 * @property ProductImage $image
 */
class Product extends ActiveRecord implements CartPositionInterface
{

    use CartPositionTrait;

    public function getPrice()
    {
        return $this->price;
    }

    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'price', 'old_price'], 'integer'],
            [['description', 'seoDescription'], 'string'],
            [['title', 'seoTitle'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'title' => 'Title',
            'description' => 'Description',
            'price' => 'Price',
            'old_price' => 'Old Price',
            'seoTitle' => 'Seo Title',
            'seoDescription' => 'Seo Description',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[ProductImages]].
     *
     * @return ActiveQuery
     */
    public function getImages()
    {
        return $this->hasMany(ProductImage::class, ['product_id' => 'id']);
    }

    /**
     * Gets query for [[ProductImages]].
     *
     * @return ActiveQuery
     */
    public function getImage()
    {
        return $this->hasOne(ProductImage::class, ['product_id' => 'id'])->where([
            'product_image.main' => true
        ]);
    }
}
