<?php


namespace frontend\widgets;


use common\models\Slider;
use yii\base\InvalidConfigException;
use yii\base\Widget;

class SliderWidget extends Widget
{
    public $place;

    public function init()
    {
        if (!$this->place) {
            throw new InvalidConfigException();
        }
        parent::init();
    }

    public function run()
    {
        $sliders = Slider::findAll([
            'place' => $this->place,
        ]);

        return $this->render('slider', [
            'sliders' => $sliders,
        ]);
    }
}
