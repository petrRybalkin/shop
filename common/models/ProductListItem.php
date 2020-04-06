<?php

namespace common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "product_list_item".
 *
 * @property int $id
 * @property int|null $list_id
 * @property int|null $sort
 * @property string|null $title
 * @property int|null $price
 *
 * @property ProductList $list
 */
class ProductListItem extends ActiveRecord
{
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
            [['list_id', 'price', 'sort'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['list_id'], 'exist', 'skipOnError' => true, 'targetClass' => ProductList::class, 'targetAttribute' => ['list_id' => 'id']],
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
            'sort' => 'Sort',
            'title' => 'Title',
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
}
