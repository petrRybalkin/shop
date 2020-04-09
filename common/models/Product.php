<?php

namespace common\models;

use frontend\components\JsonLDHelper;
use Throwable;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\db\StaleObjectException;
use yii\helpers\Url;
use yz\shoppingcart\CartPositionInterface;
use yz\shoppingcart\CartPositionTrait;

/**
 * This is the model class for table "product".
 * @see https://github.com/omnilight/yii2-shopping-cart
 *
 * @property int $id
 * @property int|null $category_id
 * @property int $sort
 * @property string|null $title
 * @property string|null $description
 * @property int|null $price
 * @property int|null $product_1c_id
 * @property int|null $old_price
 * @property int|null $weight
 * @property string|null $seoTitle
 * @property string|null $seoDescription
 *
 * @property Category $category
 * @property ProductImage[] $images
 * @property ProductImage $image
 * @property ProductList[] $lists
 * @property ProductListMap[] $productListMaps
 *
 * @mixin CartPositionTrait
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
            [['category_id', 'price', 'old_price', 'weight', 'product_1c_id', 'sort', 'superprice', 'hits'], 'integer'],
            [['description', 'seoDescription'], 'string'],
            [['title', 'seoTitle'], 'string', 'max' => 255],
            [['sort'], 'default', 'value' => 0],
            [
                ['category_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Category::class,
                'targetAttribute' => ['category_id' => 'id']
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
            'product_1c_id' => '1C ID',
            'category_id' => 'Категория',
            'sort' => 'Сортировка',
            'title' => 'Заголовок',
            'description' => 'Описание',
            'price' => 'Цена',
            'weight' => 'Вес (в граммах)',
            'superprice' => '"Суперцена"',
            'hits' => '"Хит"',
            'old_price' => 'Старая цена',
            'seoTitle' => 'Seo Title',
            'seoDescription' => 'Seo Description',
        ];
    }

    /**
     * @return ActiveQuery
     */
    public function getProductListMaps()
    {
        return $this->hasMany(ProductListMap::class, ['product_id' => 'id']);
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

    public function getUrl()
    {
        return [
            '/product/view',
            'id' => $this->id,
        ];
    }

    /**
     * @see https://schema.org/Product
     */
    public function seo()
    {
        $view = Yii::$app->view;
        $view->title = $this->seoTitle;
        $view->registerMetaTag([
            'name' => 'description',
            'content' => $this->seoDescription,
        ]);

        $seo = [
            '@context' => 'http=>//schema.org',
            '@type' => 'Product',
            'name' => $this->title,
            'offers' => [
                '@type' => 'AggregateOffer',
                'price' => $this->price,
                'priceCurrency' => 'UAH'
            ]
        ];
        if ($this->image) {
            $seo['image'] = Url::to($this->image->getImageFileUrl('image'), true);
        }
        
        JsonLDHelper::add($seo);
    }

    /**
     * @return bool
     * @throws Throwable
     * @throws StaleObjectException
     */
    public function beforeDelete()
    {
        foreach ($this->images as $image) {
            $image->delete();
        }
        return parent::beforeDelete();
    }
}
