<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "page".
 *
 * @property int $id
 * @property string|null $slug
 * @property string|null $title
 * @property string|null $description
 * @property string|null $seoTitle
 * @property string|null $seoDescription
 */
class Delivery extends Page
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'page';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string'],
            [['slug'], 'unique'],
            [['slug', 'title', 'seoTitle', 'seoDescription'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'slug' => 'Slug',
            'title' => 'Заголовок',
            'description' => 'Текст',
            'seoTitle' => 'Seo title',
            'seoDescription' => 'Seo description',
        ];
    }

    public static function findBySlug($slug)
    {
        return self::findOne([
            'slug' => $slug,
        ]);
    }
}
