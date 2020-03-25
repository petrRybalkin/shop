<?php

namespace common\models;

use common\components\gd\ImageUploadBehavior;
use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "category".
 * @see https://github.com/yii-dream-team/yii2-upload-behavior
 *
 * @property int $id
 * @property int|null $parent_id
 * @property int|null $show_in_main
 * @property string|null $title
 * @property string|null $description
 * @property string|null $seoTitle
 * @property string|null $seoDescription
 * @property string|null $image
 *
 * @property mixed $parents
 * @property Category $parent
 * @property Category[] $child
 * @property Product[] $products
 *
 * @mixin ImageUploadBehavior
 */
class Category extends ActiveRecord
{

    public function behaviors()
    {
        return [
            [
                'class' => ImageUploadBehavior::class,
                'attribute' => 'image',
                'thumbs' => [
                    'thumb' => ['width' => 100, 'height' => 100],
                ],
                'filePath' => '@webroot/images/category/[[pk]].[[extension]]',
                'fileUrl' => '/images/category/[[pk]].[[extension]]',
                'thumbPath' => '@webroot/images/category/[[profile]]_[[pk]].[[extension]]',
                'thumbUrl' => '/images/category/[[profile]]_[[pk]].[[extension]]',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['parent_id', 'show_in_main'], 'integer'],
            [['description', 'seoDescription'], 'string'],
            [['title', 'seoTitle'], 'string', 'max' => 255],
            [['image'], 'file', 'extensions' => 'jpeg, gif, png'],
            [['parent_id'], 'default', 'value' => 0],
            [['show_in_main'], 'default', 'value' => false],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'parent_id' => 'Parent ID',
            'title' => 'Title',
            'description' => 'Description',
            'seoTitle' => 'Seo Title',
            'seoDescription' => 'Seo Description',
            'image' => 'Image',
            'show_in_main' => 'Show in main page',
        ];
    }

    /**
     * Gets query for [[Products]].
     *
     * @return ActiveQuery
     */
    public function getProducts()
    {
        return $this->hasMany(Product::class, ['category_id' => 'id']);
    }

    /**
     * Gets query for [[Product]].
     */
    public function getParent()
    {
        if (!$this->parent_id) {
            return null;
        }

        return self::findOne($this->parent_id);
    }

    /**
     * @return ActiveQuery
     */
    public static function getParents()
    {
        return self::find()->where([
            'parent_id' => 0,
        ]);
    }

    public static function getParentsList()
    {
        return ArrayHelper::map(self::getParents()->select('id, title')->asArray()->all(), 'id', 'title');
    }

    /**
     * @return ActiveQuery
     */
    public function getChild()
    {
        return self::find()->where([
            'parent_id' => $this->id,
        ]);
    }

    public function getUrl()
    {
        return [
            '/category/view',
            'id' => $this->id,
        ];
    }
}
