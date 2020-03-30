<?php
use common\models\Category;
use common\models\ProductSearch;
use yii\data\ActiveDataProvider;
use yii\web\View;
use yii\widgets\ListView;

/* @var $this View */
/* @var $category Category */
/* @var $searchModel ProductSearch */
/* @var $dataProvider ActiveDataProvider */

$category->seo();

?>

<div class="products" id="cat-<?=$category->id; ?>">
    <p class="products__title"><?= $category->title; ?></p>
    <span class="products__description products__description--cat-<?=$category->id;?>"></span>
    <ul class="list-product clear five None list-cat-<?=$category->id;?> wok-product-list-">
		<?= ListView::widget([
			'itemView' => '_one',
			'dataProvider' => $dataProvider,
			'itemOptions' => [
			    'tag' => false,
			],
		]) ?>

	</ul>
</div>
