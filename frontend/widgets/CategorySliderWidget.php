<?php

namespace frontend\widgets;

use common\models\Category;
use yii\base\Widget;

class CategorySliderWidget extends Widget
{
    public function run()
    {
        $categories = Category::getParents()->all();
        return $this->render('category-slider', [
            'categories' => $categories,
        ]);
    }
}
