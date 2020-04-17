<?php


namespace frontend\widgets;


use common\models\Product;
use yii\base\Widget;

class MainPageProductsSaleWidget extends Widget
{
    public function run()
    {
        return $this->render('main-page-products-sale');
    }
}
