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
    <h3>
        <?= Html::a($category->title, $category->getUrl()) ?>
    </h3>
    <?php foreach($category->getProducts()->limit(20)->all() as $product): ?>
        <?= $this->render('//product/_one', [
            'product' => $product,
        ]) ?>
    <?php endforeach; ?>
<?php endforeach; ?>
