<?php

namespace common\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\UploadedFile;

/**
 * This is the model class for table "product_list".
 *
 * @property int $id
 * @property string|null $title
 * @property int|null $required
 * @property int $max_attributes
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
            [['required', 'max_attributes'], 'integer'],
            [['max_attributes'], 'default', 'value' => 1],
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
            'max_attributes' => 'Максимальное кол-во элементов для выбора',
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
        $productListItemIds = $this->getProductListItems()->select('id')->indexBy('id')->column();

        if ($items = Yii::$app->request->post('items')) {
            foreach ($items as $key => $item) {
                $productListItem = null;
                if (strpos($key, 'new_') === false && $productListItem = ProductListItem::findOne($key)) {
                    unset($productListItemIds[$key]);
                }
                $productListItem = $productListItem ?: new ProductListItem();
                $productListItem->setAttributes($item);
                $productListItem->list_id = $this->id;
                if ($img = UploadedFile::getInstanceByName("items[{$key}][image]")) {
                    $productListItem->image = $img;
                }
                $productListItem->save();
            }
        }

        if ($productListItemIds) {
            foreach (array_keys($productListItemIds) as $id) {
                ProductListItem::findOne($id)->delete();
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
