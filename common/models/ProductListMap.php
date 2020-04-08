<?php

namespace common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "product_list_map".
 *
 * @property int $id
 * @property int|null $product_id
 * @property int|null $list_id
 *
 * @property ProductList $list
 * @property Product $product
 */
class ProductListMap extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_list_map';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['product_id', 'list_id'], 'integer'],
            [['list_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductList::class, 'targetAttribute' => ['list_id' => 'id']],
            [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::class, 'targetAttribute' => ['product_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'list_id' => 'List ID',
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
     * Gets query for [[Product]].
     *
     * @return ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }
}
