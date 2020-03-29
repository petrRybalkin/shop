<?php

use common\models\Order;
use common\models\Product;
use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\helpers\Url;
use yz\shoppingcart\ShoppingCart;

/**
 * @var $this yii\web\View
 * @var $cart ShoppingCart
 * @var $model Order
 */

$this->title = 'Корзина';
?>

<div class="panel panel-default">
    <div class="panel-heading">
        <h1 class="panel-title">
            Корзина
        </h1>
    </div>
    <div class="panel-body">
        <?php if ($cart->isEmpty): ?>
            <div class="alert alert-danger" role="alert">
                Ваша корзина пуста
            </div>
        <?php else: ?>
            <ul>
                <?php /** @var Product $product */
                foreach ($cart->getPositions() as $product): ?>
                    <ol>
                        <a href="<?= Url::to($product->getUrl()) ?>">
                            <h4><?= $product->title ?></h4>

                            <?= Html::img($product->image ? $product->image->getThumbFileUrl('image',
                                'thumb') : 'DEFAULT IMAGE', [
                                'alt' => $product->title,
                                'title' => $product->title,
                            ]) ?>
                        </a>

                        <p>
                            <?= Html::a('Добавить 1', ['/site/buy', 'id' => $product->id, 'amount' => 1]) ?>
                            <?= Html::a('Убрать 1', ['/site/sub', 'id' => $product->id, 'amount' => 1]) ?>
                            <?= Html::a('Удалить из корзины', ['/site/remove', 'id' => $product->id]) ?>
                        </p>

                        <p>Стоимость: <?= Yii::$app->formatter->asDecimal($product->price) ?> грн</p>
                        <p>Кол-во: <?= Yii::$app->formatter->asDecimal($product->getQuantity()) ?> шт.</p>
                        <p>Цена: <?= Yii::$app->formatter->asDecimal($product->getCost()) ?> грн.</p>
                    </ol>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </div>
    <div class="panel-footer">
        Итого: <?= Yii::$app->formatter->asDecimal($cart->getCost()) ?> грн
    </div>
</div>


<?php $form = ActiveForm::begin(['id' => 'order-form']); ?>

<?= $form->field($model, 'name')->textInput(['autofocus' => true]) ?>
<?= $form->field($model, 'phone')->textInput() ?>
<?= $form->field($model, 'city')->textInput() ?>
<?= $form->field($model, 'address')->textInput() ?>
<?= $form->field($model, 'description')->textarea() ?>

<div class="form-group">
    <?= Html::submitButton('Оформить', ['class' => 'btn btn-success']) ?>
</div>

<?php ActiveForm::end(); ?>
