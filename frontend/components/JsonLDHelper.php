<?php
namespace frontend\components;

use Yii;
use yii\base\Component;
use yii\helpers\Html;
use yii\helpers\Json;

class JsonLDHelper extends Component
{
    public static function add($doc)
    {
        $view = Yii::$app->view;
        if (!is_string($doc)) {
            $doc = Json::encode($doc);
        }
        $view->params['jsonld'][] = $doc;
    }

    public static function registerScripts()
    {
        $view = Yii::$app->getView();

        if (isset($view->params['jsonld'])) {
            foreach ($view->params['jsonld'] as $jsonld) {
                echo Html::script($jsonld, ['type' => 'application/ld+json']);
            }
        }
    }
}
