<?php

namespace frontend\widgets;

use common\models\Category;
use yii\base\Widget;

class CategoryMobileWidget extends Widget
{
    public function run()
    {
        $categories = Category::getParents()->all();
        return $this->render('category-mobile-menu', [
            'categories' => $categories,
        ]);
    }
}