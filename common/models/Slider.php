<?php

namespace common\models;

use common\components\gd\ImageUploadBehavior;
use Yii;
use yii\db\ActiveRecord;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "slider".
 *
 * @property int $id
 * @property int|null $place
 * @property string|null $url
 * @property string|null $image
 *
 * @mixin ImageUploadBehavior
 */
class Slider extends ActiveRecord
{

    const PLACE_MAIN_TOP = 1;

    public function behaviors()
    {
        return [
            [
                'class' => ImageUploadBehavior::class,
                'attribute' => 'image',
                'thumbs' => [
                    'thumb' => ['width' => 1900, 'height' => 470],
                    'pr' => ['width' => 380, 'height' => 94],
                ],
                'filePath' => '@webroot/images/slider/[[pk]].[[extension]]',
                'fileUrl' => '/images/slider/[[pk]].[[extension]]',
                'thumbPath' => '@webroot/images/slider/[[profile]]_[[pk]].[[extension]]',
                'thumbUrl' => '/images/slider/[[profile]]_[[pk]].[[extension]]',
            ],
        ];
    }

    public static function placeList()
    {
        return [
            self::PLACE_MAIN_TOP => 'Главная страница',
        ];
    }

    public function placeLabel($default = '-')
    {
        return ArrayHelper::getValue(self::placeList(), $this->place, $default);
    }

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['place'], 'integer'],
            [['url'], 'url'],
            [['image'], 'file', 'extensions' => 'jpg, jpeg, gif, png'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'url' => 'Ссылка',
            'place' => 'Место',
            'image' => 'Изображение',
        ];
    }
}
