<?php

use common\models\Slider;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var $this View
 * @var $sliders Slider[]
 */

?>

<h4>Slider (убери меня)</h4>

<?php foreach($sliders as $slider): ?>
    <?= Html::img($slider->getThumbFileUrl('image', 'thumb'), [
        'alt' => 'Акция',
        'class' => 'img-thumbnail',
    ]) ?>
<?php endforeach; ?>
