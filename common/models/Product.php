<?php

namespace common\models;

use frontend\components\JsonLDHelper;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
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
 * @property int|null $list_id
 * @property string|null $seoTitle
 * @property string|null $seoDescription
 *
 * @property Category $category
 * @property ProductImage[] $images
 * @property ProductImage $image
 * @property ProductList $list
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
            [['category_id', 'price', 'old_price', 'weight', 'product_1c_id', 'sort', 'superprice', 'hits', 'list_id'], 'integer'],
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
            'list_id' => 'Доп опции',
            'superprice' => '"Суперцена"',
            'hits' => '"Хит"',
            'old_price' => 'Старая цена',
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
     * Gets query for [[Category]].
     *
     * @return ActiveQuery
     */
    public function getList()
    {
        return $this->hasOne(ProductList::class, ['id' => 'list_id']);
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
}
