<?php

namespace common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use common\components\gd\ImageUploadBehavior;

/**
 * This is the model class for table "product_image".
 * @see https://github.com/yii-dream-team/yii2-upload-behavior
 *
 * @property int $id
 * @property int|null $product_id
 * @property string|null $image
 * @property boolean|null $main
 *
 * @property Product $product
 *
 * @mixin ImageUploadBehavior
 */
class ProductImage extends ActiveRecord
{

    public function behaviors()
    {
        return [
            [
                'class' => ImageUploadBehavior::class,
                'attribute' => 'image',
                'thumbs' => [
                    'thumb' => ['width' => 260, 'height' => 170],
                ],
                'filePath' => '@webroot/images/product/[[attribute_product_id]]/[[pk]].[[extension]]',
                'fileUrl' => '/images/product/[[attribute_product_id]]/[[pk]].[[extension]]',
                'thumbPath' => '@webroot/images/product/[[attribute_product_id]]/[[profile]]_[[pk]].[[extension]]',
                'thumbUrl' => '/images/product/[[attribute_product_id]]/[[profile]]_[[pk]].[[extension]]',
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_image';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id'], 'integer'],
            [['main'], 'integer'],
//            [['image'], 'string', 'max' => 255],
            ['image', 'file', 'extensions' => 'jpeg, jpg, gif, png'],
            [
                ['product_id'],
                'exist',
                'skipOnError' => true,
                'targetClass' => Product::class,
                'targetAttribute' => ['product_id' => 'id']
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
            'product_id' => 'Товар',
            'image' => 'Изображение',
            'main' => 'Использовать как главное?',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }
}
