<?php
use common\models\Category;
use yii\helpers\Html;

/**
 * @var $this yii\web\View
 * @var $categories Category[]
 */

?>

<h2>Товары на главной</h2>

<?php foreach($categories as $category): ?>
	<div class="products" id="cat-<?=$category->id; ?>">
    	<p class="products__title"><?= $category->title; ?></p>
    	<span class="products__description products__description--cat-<?=$category->id;?>"></span>
    	<ul class="list-product clear five None list-cat-<?=$category->id;?> wok-product-list-">
		    <h3>
		        <?= Html::a($category->title, $category->getUrl()) ?>
		    </h3>
		    <?php foreach($category->getProducts()->limit(20)->all() as $product): ?>
		        <?= $this->render('//product/_one', [
		            'product' => $product,
		        ]) ?>
		    <?php endforeach; ?>
	    </ul>
	</div>
<?php endforeach; ?>


