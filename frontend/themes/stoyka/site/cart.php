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

<!--- new card -->
<div class="content">
    <div class="clear">
        <div class="breadcrumbs left">
            <ul><li><a href="/">Главная</a></li><li>Корзина</li></ul>
        </div>
    </div>
    <div class="basket-wrapper" data-min-order-price="750">
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

                <?php if ($cart->isEmpty): ?>
                    <p class="basket-empty">Корзина еще пуста!</p>
                <?php else: ?>
                    <!-- <ul> -->
                        <?php /** @var Product $product */
                        foreach ($cart->getPositions() as $product): ?>
                            <!-- <ol> -->
                                
                                <div class="row row-order" data-product-type="regular" data-href="<?= Url::to($product->getUrl()) ?>" data-gift="false" data-title="<?= $product->title ?>" data-id="172" data-image="<?= $product->image->getThumbFileUrl('image','thumb') ?>" data-quantity="4" data-description="<?= $product->description ?>" data-price="195" data-price-half="null" data-weight="170" data-unique-code="701" data-u-id="0" data-is-active="true" data-disallow_discount="false" data-promocode="null" data-min_total="null">
                                    <div class="basket-item-title">
                                        <div class="img">
                                            <a href="<?= Url::to($product->getUrl()) ?>">
                                                <!-- <img src="/media_root/products/Hot-Rolls-Kadji-iomi_BIG.png" class="img-office" alt="Ролл Каджи Ёми"> -->
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
                                            <!-- <i class="ui-spinner-button ui-spinner-up plus"><span></span></i>
                                            <i class="ui-spinner-button ui-spinner-down minus"><span></span></i> -->
                                            <?= Html::a('<i class="ui-spinner-button ui-spinner-up plus"><span></span></i>', ['/site/buy', 'id' => $product->id, 'amount' => 1]) ?>
                                            <?= Html::a('<i class="ui-spinner-button ui-spinner-down minus"><span></span></i>', ['/site/sub', 'id' => $product->id, 'amount' => 1]) ?>
                                        </span>
                                    </div>
                                    <div class="basket-item-fullprice">
                                        <p><span class="price-full"><?= Yii::$app->formatter->asDecimal($product->getCost()) ?></span> грн.</p>
                                    </div>
                                    <div class="basket-item-remove">
                                        <!-- <a href="javascript:void(0);" class="btn-archive"><span class="icon icon-delete icon-fz14"></span></a> -->
                                        <?= Html::a('<span class="icon icon-delete icon-fz14">', ['/site/remove', 'id' => $product->id, 'class' => 'btn-archive']) ?>
                                    </div>
                                
                                </div>
                            <!-- </ol> -->
                        <?php endforeach; ?>
                    <!-- </ul> -->
                <?php endif; ?>

            </div>
            <div class="basket-note">
                <div>Соевый соус, имбирь, васаби и бамбуковые палочки прилагаются к каждому заказу БЕСПЛАТНО в достаточном количестве.</div>
            </div>
            
            <div class="proposal-product hidden" data-href="/menu/onigiri/onigiri-siake/" data-id="350" data-image="/media_root/products/Onigiri-Syake_BIG.png" data-title="Онигири Сякэ" data-price="160" data-description="Онигири с приправленным соусом спайси лососем." data-weight="95" data-unique_code="503" data-quantity="1" data-is-active="true"></div>
            <div class="summ-block clear">
                <div class="left">
                    <!-- <p class="amount-additional">Вам осталось 420 р. до РОЛЛА в ПОДАРОК!</p> -->
                    <a href="/#categories" class="button small">Вернуться в меню</a>
                </div>
                <div class="right non-auth">
                    <p class="clear">
                        <span>Сумма: <span class="total-summ"><?= Yii::$app->formatter->asDecimal($cart->getCost()) ?></span> грн</span>
                                                            <?= Yii::$app->formatter->asDecimal($product->getCost()) ?> грн.
                    </p>
                    <p>
                        <b>Итого к оплате: 
                            <i class="red"><span class="summ-discount"><?= Yii::$app->formatter->asDecimal($cart->getCost()) ?></span> грн</i>
                        </b>
                    </p>
                    <p>Общий вес: <em class="total-weight">680 г.</em></p>
                </div>
            </div>
            <div class="card-block clear">
                <form class="clear" id="order-unauthorized">
                    <div class="left">
                        <p class="title">Выберите форму оплаты:</p>
                        <label class="hidden-xs-down">Выберите из списка</label>
                        <div id="dropdown" class="dd-container" style="width: 540px;">
                            <div class="dd-select" style="width: 540px; background: rgb(238, 238, 238);">
                                <input class="dd-selected-value" type="hidden" value="Cash">
                                <a class="dd-selected">
                                    <img class="dd-selected-image dd-image-right" src="/static_root/css/images/pay/cash.c8638fd47eed.png">
                                    <label class="dd-selected-text" style="line-height: 42px;">Наличные</label>
                                </a>
                                <span class="dd-pointer dd-pointer-down"></span>
                            </div>
                            <!-- <ul class="dd-options dd-click-off-close" style="width: 540px;">
                                <li>
                                    <a class="dd-option dd-option-selected"> 
                                        <input class="dd-option-value" type="hidden" value="Cash">
                                        <img class="dd-option-image dd-image-right" src="/static_root/css/images/pay/cash.c8638fd47eed.png">
                                        <label class="dd-option-text">Наличные</label>
                                    </a>
                                </li>
                                <li>
                                    <a class="dd-option">
                                        <input class="dd-option-value" type="hidden" value="SbrfMerchant">
                                        <img class="dd-option-image dd-image-right" src="/static_root/css/images/pay/visa.77a4e8594dfe.png">
                                        <label class="dd-option-text">Кредитная карта</label>
                                    </a>
                                </li>
                                <li>
                                    <a class="dd-option">
                                        <input class="dd-option-value" type="hidden" value="Qiwi40RIBRM">
                                        <img class="dd-option-image dd-image-right" src="/static_root/css/images/pay/qiwi.d65da0211ba6.png">
                                        <label class="dd-option-text">QIWI</label>
                                    </a>
                                </li>
                                <li>
                                    <a class="dd-option">
                                        <input class="dd-option-value" type="hidden" value="YandexMerchantRIB2R">
                                        <img class="dd-option-image dd-image-right" src="/static_root/css/images/pay/yandex.aa8fd7b48705.png">
                                        <label class="dd-option-text">Яндекс деньги</label>
                                    </a>
                                </li>
                                <li>
                                    <a class="dd-option">
                                        <input class="dd-option-value" type="hidden" value="WMROM">
                                        <img class="dd-option-image dd-image-right" src="/static_root/css/images/pay/webmoney.e7820efa9c05.png">
                                        <label class="dd-option-text">Web-money</label>
                                    </a>
                                </li>
                                <li>
                                    <a class="dd-option">
                                        <input class="dd-option-value" type="hidden" value="OtherEMoney">
                                        <label class="dd-option-text">Прочие электронные деньги</label>
                                    </a>
                                </li>
                            </ul> -->
                        </div>
                    </div>
                    <div class="right">
                        <p class="title hidden-xs-down">Информация о пользователе:</p>
                        <div class="form-block left">
                            <label for="name">Ваше имя <i>*</i></label>
                            <input type="text" name="name" id="name">
                        </div>
                        <div class="form-block right">
                            <label for="phone-unregister">Номер телефона <i>*</i></label>
                            <input type="tel" name="phone" id="phone-unregister">
                        </div>
                        <div class="button-loader-order-unauth">
                            <div class="loader-inner ball-scale-ripple-multiple">
                                <div></div>
                                <div></div>
                                <div></div>
                            </div>
                        </div>
                        <!-- <button class="button nonauthorized-continue-order">Оформить заказ</button> -->
                        <?= Html::submitButton('Оформить заказ', ['class' => 'button nonauthorized-continue-order']) ?>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

<?php ActiveForm::end(); ?>
