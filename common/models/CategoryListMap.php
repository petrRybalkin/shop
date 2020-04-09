<?php

namespace common\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "category_list_map".
 *
 * @property int $id
 * @property int|null $category_id
 * @property int|null $list_id
 *
 * @property Category $category
 * @property ProductList $list
 */
class CategoryListMap extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category_list_map';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'list_id'], 'integer'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
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
            'category_id' => 'Category ID',
            'list_id' => 'List ID',
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
     * Gets query for [[List]].
     *
     * @return ActiveQuery
     */
    public function getList()
    {
        return $this->hasOne(ProductList::class, ['id' => 'list_id']);
    }
}
