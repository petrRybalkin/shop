<?php

use common\models\Slider;
use yii\helpers\Html;
use yii\web\View;

/**
 * @var $this View
 * @var $sliders Slider[]
 */

?>
<?php if (!empty($sliders)){ ?>
<div class="slider slider1">
	<div class="sliderContent">
		<?php foreach($sliders as $slider): ?>
		    <div class="item">
		      	<?= Html::img($slider->getThumbFileUrl('image', 'thumb'), [
		        	'alt' => 'Акция',
		        	'class' => 'img-slider',
		        	'style' => 'width:100%',
		    	]) ?>
			</div>
		<?php endforeach; ?>
			
	</div>
</div>
<?php } ?>
