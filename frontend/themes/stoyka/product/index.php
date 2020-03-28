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

<h1><?= $category->title ?></h1>


<?= ListView::widget([
    'itemView' => '_one',
    'dataProvider' => $dataProvider,
    'itemOptions' => [
        'tag' => false,
    ],
]) ?>
