<?php

use backend\models\Settings;
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


<!--- new card -->
<div class="content">
    <div class="clear">
        <div class="breadcrumbs left">
            <ul><li><a href="/">Главная</a></li><li>Корзина</li></ul>
        </div>
    </div>

    <div class="basket-wrapper" data-min-order-price="750">
        <?php if ($cart->isEmpty): ?>
            <p class="basket-empty">Корзина еще пуста!</p>
        <?php else: ?>
        <p class="products__title">Мой обед</p>
        <div class="block basket clear">
            <div class="table archive-two" id="basketItems">
                <div class="row row-title">
                    <div class="basket-item-title"><p>Название</p></div>
                    <div class="basket-item-weight"><p>Вес</p></div>
                    <div class="basket-item-price"><p>Цена</p></div>
                      
                    <div class="basket-item-quantity"><p>Количество</p></div>
                    <div class="basket-item-fullprice"><p>Сумма</p></div>
                    <div class="hidden-xs-down"><p></p></div>
                </div>

            <?php /** @var Product $product */
                foreach ($cart->getPositions() as $product): ?>

                <div class="row row-order" data-product-type="regular"  data-gift="false" data-title="<?= $product->title ?>" data-id="<?= $product->id ?>">
                    <div class="basket-item-title">
                        <div class="img">
                            <a href="<?= Url::to($product->getUrl()) ?>">
                                <?= Html::img($product->image ? $product->image->getThumbFileUrl('image',
                                    'thumb') : 'DEFAULT IMAGE', [
                                    'alt' => $product->title,
                                    'title' => $product->title,
                                    'class' => "img-office",
                                        ]) ?>
                            </a>
                        </div>
                        <div class="txt">
                            <a href="<?= Url::to($product->getUrl()) ?>" class="name-archive-product"><?= $product->title ?></a>
                            <span class="product-inside"><?= $product->description ?></span>
                        </div>
                    </div>
                    <div class="basket-item-weight"><p><?= $product->weight ?> г.</p></div>
                    <div class="basket-item-price"><p><span><?= Yii::$app->formatter->asDecimal($product->price) ?></span> грн</p></div>
                    <div class="basket-item-quantity">
                        <p class="basket-item-quantity" style="display:none;"><span><?= Yii::$app->formatter->asDecimal($product->getQuantity()) ?></span></p>
                        <span class="counter">
                            <input type="text" name="counter" value="<?= Yii::$app->formatter->asDecimal($product->getQuantity()) ?>">
                            <?= Html::a('<i class="ui-spinner-button ui-spinner-up plus"><span></span></i>', ['/site/buy', 'id' => $product->id, 'amount' => 1]) ?>
                            <?= Html::a('<i class="ui-spinner-button ui-spinner-down minus"><span></span></i>', ['/site/sub', 'id' => $product->id, 'amount' => 1]) ?>
                        </span>
                    </div>
                    <div class="basket-item-fullprice">
                        <p><span class="price-full"><?= Yii::$app->formatter->asDecimal($product->getCost()) ?></span> грн.</p>
                    </div>
                    <div class="basket-item-remove">
                        <?= Html::a('<span class="icon icon-delete icon-fz14">', ['/site/remove', 'id' => $product->id, 'class' => 'btn-archive']) ?>
                    </div> 
                </div>
                            
            <?php endforeach; ?>
        

            </div>
            <div class="basket-note">
                <div>Соевый соус, имбирь, васаби и бамбуковые палочки прилагаются к каждому заказу БЕСПЛАТНО в достаточном количестве.</div>
            </div>
            
            <div class="proposal-product hidden" data-id="350" data-title="<?= $product->title ?>" data-price="160" data-weight="95" data-unique_code="503" data-quantity="1" data-is-active="true"></div>
            <div class="summ-block clear">
                <div class="left"><a href="/#categories" class="button small">Вернуться в меню</a></div>
                <div class="right non-auth">
                    <p class="clear">
                        <span>Сумма: <span class="total-summ"><?= Yii::$app->formatter->asDecimal($cart->getCost()) ?></span> грн</span>
                    </p>
                    <p class="clear">
                        <span>Стоимость доставки: <span class="total-summ"><?= Yii::$app->formatter->asDecimal(Settings::calcDeliveryPrice()) ?></span> грн</span>
                        <?php if(Settings::calcDeliveryPrice()): ?>
                            <span>(* При заказе свыше <span class="total-summ"><?= Settings::calcDeliveryMin() ?></span> грн, доставка бесплатная)</span>
                        <?php endif; ?>
                    </p>
                    <p>
                        <b>Итого к оплате: 
                            <i class="red"><span class="summ-discount"><?= Yii::$app->formatter->asDecimal($cart->getCost() + Settings::calcDeliveryPrice()) ?></span> грн</i>
                        </b>
                    </p>
                </div>
            </div>
            <div class="card-block clear">
                <?php $form = ActiveForm::begin(['id' => 'order-form', 'class' => 'clear']); ?>
                    <div class="left">
                        <p class="title">Форма оплаты:</p>
                        <label class="hidden-xs-down"><!-- Выберите из списка -->&nbsp;</label>
                        <div id="dropdown" class="dd-container" style="width: 540px;">
                            <div class="dd-select" style="width: 540px; background: rgb(238, 238, 238);">
                                <input class="dd-selected-value" type="hidden" value="Cash">
                                <a class="dd-selected">
                                    <img class="dd-selected-image dd-image-right" src="<?= Url::to('@web/img/cash.png') ?>">
                                    <span class="dd-selected-text" style="line-height: 42px;">Наличные</span>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="right">
                        <p class="title hidden-xs-down">Информация о пользователе:</p>
                        <div class="form-block left">
                            <?= $form->field($model, 'name')->textInput(['autofocus' => true])->label('Имя: ') ?>
                        </div>
                        <div class="form-block left">
                            <?= $form->field($model, 'phone')->textInput()->label('Телефон: ') ?>
                        </div>
                        <br>
                        <div class="form-block left">
                            <?= $form->field($model, 'city')->textInput()->label('Город: ') ?>
                        </div>
                        <div class="form-block right">
                            <?= $form->field($model, 'address')->textInput()->label('Адресс: ') ?>
                        </div>
                        <br>
                        <div class="form-block right">
                            <?= $form->field($model, 'description')->textarea(['cols'=>'70','rows'=>'3'])->label('Комментарий: ') ?>
                        </div>
                        <div class="button-loader-order-unauth">
                            <div class="loader-inner ball-scale-ripple-multiple">
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                        <?= Html::submitButton('Оформить заказ', ['class' => 'button nonauthorized-continue-order']) ?>   
                    </div>
                <?php ActiveForm::end(); ?>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>


