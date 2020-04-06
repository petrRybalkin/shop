<?php

namespace common\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;

/**
 * This is the model class for table "product_list".
 *
 * @property int $id
 * @property string|null $title
 * @property int|null $required
 *
 * @property ProductListItem[] $productListItems
 */
class ProductList extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'product_list';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['required'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Название списка',
            'required' => 'Обязательно',
        ];
    }

    /**
     * Gets query for [[ProductListItems]].
     *
     * @return ActiveQuery
     */
    public function getProductListItems()
    {
        return $this->hasMany(ProductListItem::class, ['list_id' => 'id'])->orderBy([
            'sort' => SORT_DESC,
        ]);
    }

    public function beforeDelete()
    {
        $this->unlinkAll('productListItems', true);
        return parent::beforeDelete();
    }

    public function afterSave($insert, $changedAttributes)
    {
        $this->unlinkAll('productListItems', true);

        if ($items = Yii::$app->request->post('items')) {
            foreach ($items as $item) {
                $productListItem = new ProductListItem();
                $productListItem->setAttributes($item);
                $this->link('productListItems', $productListItem);
            }
        }

        parent::afterSave($insert, $changedAttributes);
    }

    public function getHtmlItems()
    {
        return Html::ol(ArrayHelper::getColumn($this->productListItems, function (ProductListItem $model) {
            return "{$model->title} ({$model->price} грн)";
        }));
    }
}
