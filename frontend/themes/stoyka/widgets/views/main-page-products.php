<?php
use common\models\Category;
use yii\data\ArrayDataProvider;
use yii\helpers\Html;
use yii\widgets\ListView;

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

            <?= ListView::widget([
                'itemView' => '//product/_one',
                'dataProvider' => new ArrayDataProvider([
                    'allModels' => $category->getProducts()->limit(20)->all(),
                    'pagination' => false,
                ]),
                'itemOptions' => [
                    'tag' => false,
                ],
            ]) ?>

	    </ul>
	</div>
<?php endforeach; ?>


