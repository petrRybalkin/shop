<?php


namespace frontend\widgets;


use common\models\Category;
use yii\base\Widget;

class MainPageProductsWidget extends Widget
{
    public function run()
    {
        $categories = Category::find()
            ->where([
                'show_in_main' => true,
            ])
            ->all();

        return $this->render('main-page-products', [
            'categories' => $categories,
        ]);
    }
}
