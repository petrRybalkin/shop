<?php

use common\models\Slider;
use yii\helpers\Html;
use yii\web\View;
use frontend\assets\SliderAsset;


/**
 * @var $this View
 * @var $sliders Slider[]
 */
SliderAsset::register($this);
?>
<?php if (!empty($sliders)){ ?>
<div class="slider slider1">
	<div class="sliderContent">
		<?php foreach($sliders as $slider): ?>
		    <div class="item">
                <?php if($slider->url != null){
                    $slide_url = $slider->url;
                    $target = '_blank';
                } else {
                    $slide_url = '/';
                    $target = '_self';
                } ?>
                <a href="<?= $slide_url ?>" target="<?= $target ?>">
		      	<?= Html::img($slider->getThumbFileUrl('image', 'thumb'), [
		        	'alt' => 'Акция',
		        	'class' => 'img-slider',
		        	'style' => 'width:100%',
		    	]) ?>
                </a>
			</div>
		<?php endforeach; ?>
			
	</div>
</div>
<?php } ?>
