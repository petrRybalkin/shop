<?php

namespace frontend\widgets;

use common\models\Page;
use yii\web\View;
use yii\base\Widget;

class MainPageDiscriptionWidget extends Widget
{
    public function run()
    {
        if (!$model = Page::findBySlug('main')) {
            throw new NotFoundHttpException();
        }

        return $this->render('main-page-discription', [
            'model' => $model,
        ]);
    }
}