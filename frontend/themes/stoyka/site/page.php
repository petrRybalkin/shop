<?php

use common\models\Page;
use yii\web\View;

/**
 * @var $this View
 * @var $model Page
 */

$this->title = $model->seoTitle;
$this->registerMetaTag([
    'name' => 'description',
    'content' => $model->seoDescription,
]);

?>

<h1>
    <?= $model->title ?>
</h1>



<?= $model->description ?>
