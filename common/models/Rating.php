<?php

namespace app\common\models;

use common\models\Category;
use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;
use common\models\Product;

/**
 * This is the model class for table "{{%product_rating}}".
 *
 * @property int $id
 * @property int|null $product_id
 * @property int|null $rating
 * @property int|null $ip
 * @property string|null $created_at
 *
 * @property Product $product
 */
class Rating extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%product_rating}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            // [['product_id', 'user_id', 'rating'], 'integer'],
            // [['ip'], 'string'],
            // [['created_at'], 'safe'],
            // [['product_id'], 'exist', 'skipOnError' => true, 'targetClass' => Product::className(), 'targetAttribute' => ['product_id' => 'id']],
            // [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],

            [['created_at', 'product_id'], 'integer'],
            [['rating'], 'number'],
            [['ip'], 'string'],
            [['rating', 'product_id'], 'safe'],
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
            'product_id' => 'Product ID',
            //'user_id' => 'User ID',
            'rating' => 'Rating',
            'created_at' => 'Created At',
            'ip' => 'IP',
        ];
    }

    /**
     * Gets query for [[Product]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getProduct()
    {
        return $this->hasOne(Product::class, ['id' => 'product_id']);
    }

//    /**
//     * Gets query for [[User]].
//     *
//     * @return \yii\db\ActiveQuery|UserQuery
//     */
    // public function getUser()
    // {
    //     return $this->hasOne(User::className(), ['id' => 'user_id']);
    // }

    public static function create($rating, $product_id)
    {
        $post = new self;
        $post->ip = Yii::$app->request->getUserIP();
        $post->created_at = time();
        $post->rating = $rating;
        $post->product_id = $product_id;
        if ($post->save()) return $post;
        return false;
    }
    
    public function beforeSave($insert)
    {
        if ($this->isNewRecord) {
            if (($rating = Product::findOne($this->product_id)) !== null) {
                $rating->updateAttributes(['update_utime'=>$this->created_at]);
            }
        }
        return parent::beforeSave($insert);
    }

     public function afterSave($insert, $changedAttributes)
     {
     	if ($insert) {
     		Product::getRating($this->product_id);
     	}
     	return parent::afterSave($insert, $changedAttributes);
     }

//    /**
//     * {@inheritdoc}
//     * @return RatingQuery the active query used by this AR class.
//     */
//    public static function find()
//    {
//        return new RatingQuery(get_called_class());
//    }
}
