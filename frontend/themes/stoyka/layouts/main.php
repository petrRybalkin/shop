<?php

/* @var $this View */
/* @var $content string */

use frontend\components\JsonLDHelper;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\web\View;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use frontend\widgets\CategorySliderWidget;
use frontend\widgets\CartWidget;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
    <head>
        <meta charset="<?= Yii::$app->charset ?>">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <?php $this->registerCsrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>

        <?= JsonLDHelper::registerScripts() ?>

    </head>
    <body>
    <?php $this->beginBody() ?>
        <header>
            <?php
            NavBar::begin([
                'brandLabel' => Yii::$app->name,
                'brandImage' => '../images/logo-header3.png',
                'brandUrl' => Yii::$app->homeUrl,
                'options' => [
                    'class' => 'navbar-inverse navbar-fixed-top',
                ],
            ]);
            $menuItems = [
                //['label' => 'Home', 'url' => ['/site/index']],
                ['label' => 'Доставка и Оплата', 'url' => ['/']],
                ['label' => 'О нас', 'url' => ['/site/about']],
                ['label' => 'Contact', 'url' => ['/site/contact']],
            ];
            if (Yii::$app->user->isGuest) {
                $menuItems[] = ['label' => 'Войти', 'url' => ['/site/login']];
                $menuItems[] = ['label' => 'Регистрация', 'url' => ['/site/signup']];
            } else {
                $menuItems[] = '<li>'
                    . Html::beginForm(['/site/logout'], 'post')
                    . Html::submitButton(
                        'Logout (' . Yii::$app->user->identity->username . ')',
                        ['class' => 'btn btn-link logout']
                    )
                    . Html::endForm()
                    . '</li>';
            }
            echo Nav::widget([
                'options' => ['class' => 'navbar-nav navbar-right'],
                'items' => $menuItems,
            ]);
            NavBar::end();

            echo CartWidget::widget();
            ?>
            <div class="container">
                <?= CategorySliderWidget::widget() ?>
            </div>
        </header>
        <div class="wrap">
            
            <div class="container">
                <?= Breadcrumbs::widget([
                    'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                ]) ?>
                <?= Alert::widget() ?>
                <?= $content ?>
            </div>
        </div>

        <div class="container">
            <div class="wrapper">
                <div class="header-bottom js-header-bottom clear">
                    <div class="container">
                        <div class="header-bottom__left">
                            <nav>
                                <ul class="clear">
                                    <li><a href="/" class="main-logo"></a></li>
                                    <li><a href="/gifts/">Акции</a></li>
                                    <li><a href="/about_delivery/">Доставка</a></li>
                                    <li><a href="/reviews/">Отзывы</a></li>
                                    <li><a href="#" class="promocode-nav js-promocode-window">Промокод</a></li>
                                    <li class="contact-items">
                                        <a href="tel:+74956171424"><strong class="main-phone">+7 (495) 617-14-24</strong></a>
                                        <a href="#" class="phone-call- phone-call-link">заказать звонок</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="header-bottom__right">
                            <nav>
                                <ul class="clear">
                                    <li class="no-register">
                                        <a href="/auth/signin/">Войти</a>
                                        <a href="/auth/register/">Регистрация</a>
                                    </li>
                                    <li><a href="/basket/" class="header-bottom__basket">105 р.</a><span class="cart-count">1</span></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                </div>
                <div class="bg-header">
                    <div class="header-wrap js-header-resp resp-sticky" style="position: fixed; top: 0px;">
                        <header>
                            <div class="content"><!-- new responsive header -->
                                <div class="header-resp hidden-lg-up">
                                    <div class="header-resp__logo">
                                        <a href="/"><img src="/static_root/css/images/logo-header.1fa1f84f685a.png" alt="logo"></a>
                                    </div>
                                    <div class="header-resp__nav">
                                        <button type="button" class="ssm-toggle-nav navbar-toggle active ssm-nav-visible" data-toggle="collapse">
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>
                                    <div class="header-resp__cart">
                                        <a href="/basket/" class="header-bottom__basket">105 р.</a>
                                        <span class="cart-count">1</span>
                                    </div>
                                </div>
                            </div>
                        </header>
                        <div class="ssm-overlay ssm-toggle-nav ssm-nav-visible" style="display: none;"></div>
                        <div class="navbar" style="transition-duration: 0.3s; transform: translate(-280px, 0px);">
                            <a href="#" class="menu-close ssm-toggle-nav ssm-nav-visible">×</a>
                            <!-- <div class="navbar-logo"></div> -->
                            <div class="navbar-wrap">
                                <ul class="navbar-menu">
                                    <li class="phone-link"><a href="tel:+74956171424">+7 (495) 617-14-24</a></li>
                                    <li class="gift-link"><a href="/gifts/">Промокод / Акции</a></li>
                                    <li class="delivery-link"><a href="/about_delivery/">О доставке</a></li>
                                    <li><a href="/menu/top-10/" class="js-scroll-to-cat-mob" data-url="/menu/top-10/" data-hash="#cat-30" style="background-image: url('/media_root/categories/mini/Top-20-menu-icon.png')">ТОП-10</a></li>
                                    <li><a href="/menu/rolly/" class="js-scroll-to-cat-mob" data-url="/menu/rolly/" data-hash="#cat-4" style="background-image: url('/media_root/categories/mini/menu-icon-rolly.png')">Роллы</a></li>
                                    <li><a href="/menu/sushi/" class="js-scroll-to-cat-mob" data-url="/menu/sushi/" data-hash="#cat-3" style="background-image: url('/media_root/categories/mini/menu-icon-sushi.png')">Суши</a></li>
                                    <li><a href="/menu/teplye-rolly/" class="js-scroll-to-cat-mob" data-url="/menu/teplye-rolly/" data-hash="#cat-5" style="background-image: url('/media_root/categories/mini/menu-icon-tempura.png')">Теплые роллы</a></li>
                                    <li><a href="/wok/" style="background-image: url('https://www.sushi-profi.ru/static_root/images/wok-icon.b4e27042d8cf.png')">ВОК</a></li>
                                    <li><a href="/menu/assorti-sety/" class="js-scroll-to-cat-mob" data-url="/menu/assorti-sety/" data-hash="#cat-8" style="background-image: url('/media_root/categories/mini/menu-icon-set.png')">Ассорти-сеты</a></li>
                                    <li><a href="/menu/pizzas/" class="js-scroll-to-cat-mob" data-url="/menu/pizzas/" data-hash="#cat-23" style="background-image: url('/media_root/categories/mini/menu-icon-pizza2.png')">Пиццы</a></li>
                                    <li><a href="/menu/vegetarianskie-blyuda/" class="js-scroll-to-cat-mob" data-url="/menu/vegetarianskie-blyuda/" data-hash="#cat-26" style="background-image: url('/media_root/categories/mini/menu-icon-vegan.png')">Постное</a></li>
                                    <li><a href="/menu/sashimi/" class="js-scroll-to-cat-mob" data-url="/menu/sashimi/" data-hash="#cat-7" style="background-image: url('/media_root/categories/mini/menu-icon-sashimi.png')">Сашими</a></li>
                                    <li><a href="/menu/kadzari/" class="js-scroll-to-cat-mob" data-url="/menu/kadzari/" data-hash="#cat-24" style="background-image: url('/media_root/categories/mini/menu-icon-kadzari.png')">Кадзари</a></li>
                                    <li><a href="/menu/boks-sushi/" class="js-scroll-to-cat-mob" data-url="/menu/boks-sushi/" data-hash="#cat-6" style="background-image: url('/media_root/categories/mini/menu-icon-box.png')">Бокс-суши</a></li>
                                    <li><a href="/menu/onigiri/" class="js-scroll-to-cat-mob" data-url="/menu/onigiri/" data-hash="#cat-15" style="background-image: url('/media_root/categories/mini/menu-icon-onigiri.png')">Онигири</a></li>
                                    <li><a href="/menu/salaty/" class="js-scroll-to-cat-mob" data-url="/menu/salaty/" data-hash="#cat-12" style="background-image: url('/media_root/categories/mini/menu-icon-salads.png')">Салаты</a></li>
                                    <li><a href="/menu/supy/" class="js-scroll-to-cat-mob" data-url="/menu/supy/" data-hash="#cat-9" style="background-image: url('/media_root/categories/mini/menu-icon-soup.png')">Супы</a></li>
                                    <li><a href="/menu/goriachee/" class="js-scroll-to-cat-mob" data-url="/menu/goriachee/" data-hash="#cat-11" style="background-image: url('/media_root/categories/mini/menu-icon-kebab.png')">Горячее</a></li>
                                    <li><a href="/menu/deserty/" class="js-scroll-to-cat-mob" data-url="/menu/deserty/" data-hash="#cat-13" style="background-image: url('/media_root/categories/mini/menu-icon-dessert.png')">Десерты</a></li>
                                    <li><a href="/menu/detiam/" class="js-scroll-to-cat-mob" data-url="/menu/detiam/" data-hash="#cat-16" style="background-image: url('/media_root/categories/mini/menu-icon-kids.png')">Детям</a></li>
                                    <li><a href="/menu/napitki/" class="js-scroll-to-cat-mob" data-url="/menu/napitki/" data-hash="#cat-14" style="background-image: url('/media_root/categories/mini/menu-icon-beverage.png')">Напитки</a></li>
                                    <li><a href="/menu/sousy/" class="js-scroll-to-cat-mob" data-url="/menu/sousy/" data-hash="#cat-2" style="background-image: url('/media_root/categories/mini/menu-icon-sauce.png')">Соусы</a></li>
                                    <li><a href="/menu/servirovka/" class="js-scroll-to-cat-mob" data-url="/menu/servirovka/" data-hash="#cat-19" style="background-image: url('/media_root/categories/mini/menu-icon-dishes.png')">Сервировка</a></li></ul><hr><ul class="navbar-othermenu guest"><li><a href="/auth/signin/">Войти</a></li>
                                        <li><a href="/auth/register/">Регистрация</a></li>
                                    <li><a href="/interesting/fakty-o-yaponii/">Интересное</a></li>
                                    <li><a href="/reviews/">Отзывы</a></li>
                                    <li><a href="/about/">О нас</a></li>
                                    <li>&nbsp;</li>
                                    <li>&nbsp;</li>
                                    <li>&nbsp;</li>
                                    <li>&nbsp;</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <section class="banner" style="margin-top: 70px;">
                        <div class="content">
                            <div class="action-resp" style="display:none;">
                                <style></style>
                                <div class="fotorama--hidden"></div>
                                <div class="fotorama fotorama1585215464602" data-width="100%" data-max-width="100%" data-click="false" data-loop="true" data-autoplay="true">
                                    <div class="fotorama__wrap fotorama__wrap--css3 fotorama__wrap--slide fotorama__wrap--toggle-arrows" style="width: 100%; min-width: 0px; max-width: 100%;">
                                        <div class="fotorama__stage" style="width: 100px; height: 130px;">
                                            <div class="fotorama__stage__shaft fotorama__grab" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px); width: 100px; margin-left: 0px;">
                                                <div class="fotorama__stage__frame fotorama__loaded fotorama__loaded--img" style="left: -102px;">
                                                    <img src="/media_root/offers/slide-3-mob_Pik2.jpg" class="fotorama__img" style="width: 100px; height: 129.73px; left: 0px; top: 0.135135px;">
                                                    <div class="fotorama__html">
                                                        <div data-img="/media_root/offers/slide-3-mob_Pik2.jpg" style="height:100%;">
                                                            <a href="/gifts#action-4" style="display:block; height:100%;">&nbsp;</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="fotorama__stage__frame fotorama__loaded fotorama__loaded--img fotorama__active" style="left: 0px;">
                                                    <img src="/media_root/offers/slide-5-mob_Pik.jpg" class="fotorama__img" style="width: 100px; height: 129.73px; left: 0px; top: 0.135135px;">
                                                    <div class="fotorama__html">
                                                        <div data-img="/media_root/offers/slide-5-mob_Pik.jpg" style="height:100%;">
                                                            <a href="/gifts#action-3" style="display:block; height:100%;">&nbsp;</a>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="fotorama__stage__frame fotorama__loaded fotorama__loaded--img" style="left: 102px;">
                                                    <img src="/media_root/offers/slide-4-mob_Min.jpg" class="fotorama__img" style="width: 100px; height: 129.73px; left: 0px; top: 0.135135px;">
                                                    <div class="fotorama__html">
                                                        <div data-img="/media_root/offers/slide-4-mob_Min.jpg" style="height:100%;">
                                                            <a href="/gifts#action-1" style="display:block; height:100%;">&nbsp;</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="fotorama__arr fotorama__arr--prev" tabindex="0" role="button"></div>
                                            <div class="fotorama__arr fotorama__arr--next" tabindex="0" role="button"></div>
                                            <div class="fotorama__video-close"></div>
                                        </div>
                                        <div class="fotorama__nav-wrap">
                                            <div class="fotorama__nav fotorama__nav--dots" style="width: 100px;">
                                                <div class="fotorama__nav__shaft" style="transition-duration: 330ms; transform: translate3d(0px, 0px, 0px);">
                                                    <div class="fotorama__thumb-border"></div>
                                                    <div class="fotorama__nav__frame fotorama__nav__frame--dot" tabindex="0" role="button">
                                                        <div class="fotorama__dot"></div>
                                                    </div>
                                                    <div class="fotorama__nav__frame fotorama__nav__frame--dot" tabindex="0" role="button">
                                                        <div class="fotorama__dot"></div>
                                                    </div>
                                                    <div class="fotorama__nav__frame fotorama__nav__frame--dot" tabindex="0" role="button">
                                                        <div class="fotorama__dot"></div>
                                                    </div>
                                                    <div class="fotorama__nav__frame fotorama__nav__frame--dot" tabindex="0" role="button">
                                                        <div class="fotorama__dot"></div>
                                                    </div>
                                                    <div class="fotorama__nav__frame fotorama__nav__frame--dot fotorama__active" tabindex="0" role="button">
                                                        <div class="fotorama__dot"></div>
                                                    </div>
                                                    <div class="fotorama__nav__frame fotorama__nav__frame--dot" tabindex="0" role="button">
                                                        <div class="fotorama__dot"></div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                    <section class="actions hidden-sm-down" style="margin-top: 70px;">
                        <style></style>
                        <div class="fotorama--hidden"></div>
                        <div class="fotorama fotorama1585210857197" data-width="100%" data-max-width="100%" data-click="false" data-loop="true" data-autoplay="true">
                            <div class="fotorama__wrap fotorama__wrap--css3 fotorama__wrap--slide fotorama__wrap--toggle-arrows" style="width: 100%; min-width: 0px; max-width: 100%;">
                                <div class="fotorama__stage" style="width: 1215px; height: 301px;">
                                    <div class="fotorama__stage__shaft fotorama__grab" style="transition-duration: 0ms; transform: translate3d(0px, 0px, 0px); width: 1215px; margin-left: 0px;">
                                        <div class="fotorama__stage__frame fotorama__loaded fotorama__loaded--img" style="left: -1217px;">
                                            <img src="/static_root/images/slide-hh.06c0f1d147a2.jpg" class="fotorama__img" style="width: 1215px; height: 300.553px; left: 0px; top: 0.223684px;">
                                            <div class="fotorama__html">
                                                <div data-img="/static_root/images/slide-hh.06c0f1d147a2.jpg" style="height:100%; position:relative;">
                                                    <a href="/menu/rolly/roll-bangkok/" style="display:block; height:100%; position:relative; z-index:1000;">&nbsp;</a>
                                                    <div style="position:absolute; top:36%; left:29%; font-size:2.6vw; text-transform:uppercase; font-weight:bold;">Ролл Бангкок</div>
                                                    <div style="position:absolute; top:60%; left:48%; font-size:2vw; color:#ac0808;">за <strong style="font-size:3vw; color:#ac0808;">170</strong> руб.
                                                    </div>
                                                    <img style="position:absolute; top:17%; left:67%; font-size:36px; width:24%;" src="/media_root/products/Rolls-Bangkok_BIG.png" alt="Ролл Бангкок">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="fotorama__stage__frame fotorama__loaded fotorama__loaded--img fotorama__active" style="left: 0px;">
                                            <img src="/media_root/offers/slide-2_Pik-2.jpg" class="fotorama__img" style="width: 1215px; height: 300.553px; left: 0px; top: 0.223684px;">
                                            <div class="fotorama__html">
                                                <div data-img="/media_root/offers/slide-2_Pik-2.jpg" style="height:100%;">
                                                    <a href="/gifts#action-59" style="display:block; height:100%;">&nbsp;</a>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="fotorama__stage__frame fotorama__loaded fotorama__loaded--img" style="left: 1217px;">
                                            <img src="/media_root/offers/slide-3_Pik2.jpg" class="fotorama__img" style="width: 1215px; height: 300.553px; left: 0px; top: 0.223684px;">
                                            <div class="fotorama__html">
                                                <div data-img="/media_root/offers/slide-3_Pik2.jpg" style="height:100%;">
                                                    <a href="/gifts#action-4" style="display:block; height:100%;">&nbsp;</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="fotorama__arr fotorama__arr--prev" tabindex="0" role="button"></div>
                                    <div class="fotorama__arr fotorama__arr--next" tabindex="0" role="button"></div>
                                    <div class="fotorama__video-close"></div>
                                </div>
                                <div class="fotorama__nav-wrap">
                                    <div class="fotorama__nav fotorama__nav--dots" style="width: 1215px;">
                                        <div class="fotorama__nav__shaft" style="transition-duration: 330ms; transform: translate3d(0px, 0px, 0px);">
                                            <div class="fotorama__thumb-border"></div>
                                            <div class="fotorama__nav__frame fotorama__nav__frame--dot" tabindex="0" role="button">
                                                <div class="fotorama__dot"></div>
                                            </div>
                                            <div class="fotorama__nav__frame fotorama__nav__frame--dot" tabindex="0" role="button">
                                                <div class="fotorama__dot"></div>
                                            </div>
                                            <div class="fotorama__nav__frame fotorama__nav__frame--dot fotorama__active" tabindex="0" role="button">
                                                <div class="fotorama__dot"></div>
                                            </div>
                                            <div class="fotorama__nav__frame fotorama__nav__frame--dot" tabindex="0" role="button">
                                                <div class="fotorama__dot"></div>
                                            </div>
                                            <div class="fotorama__nav__frame fotorama__nav__frame--dot" tabindex="0" role="button">
                                                <div class="fotorama__dot"></div>
                                            </div>
                                            <div class="fotorama__nav__frame fotorama__nav__frame--dot" tabindex="0" role="button">
                                                <div class="fotorama__dot"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
                <div class="swiper-container cat-nav hidden-sm-down swiper-container-initialized swiper-container-horizontal swiper-container-free-mode">
                    <div class="swiper-wrapper">
                        <div class="swiper-slide swiper-slide-active" style="width: 58.9286px; margin-right: 30px;">
                            <a href="/menu/top-10/" class=" big-menu-top-10 js-scroll-to-cat-desktop" style="background-image: url('/media_root/categories/mini/Top-20-menu-icon-hovered.png')" data-url="/menu/top-10/" data-hash="#cat-30">ТОП-10</a>
                        </div>
                        <div class="swiper-slide swiper-slide-next" style="width: 58.9286px; margin-right: 30px;">
                            <a href="/menu/rolly/" class=" big-menu-rolly js-scroll-to-cat-desktop" style="background-image: url('/media_root/categories/mini/menu-icon-rolly-hovered.png')" data-url="/menu/rolly/" data-hash="#cat-4">Роллы</a>
                        </div>
                        <div class="swiper-slide" style="width: 58.9286px; margin-right: 30px;">
                            <a href="/menu/sushi/" class=" big-menu-sushi js-scroll-to-cat-desktop" style="background-image: url('/media_root/categories/mini/menu-icon-sushi-hovered.png')" data-url="/menu/sushi/" data-hash="#cat-3">Суши</a>
                        </div>
                        <div class="swiper-slide" style="width: 58.9286px; margin-right: 30px;">
                            <a href="/menu/teplye-rolly/" class=" big-menu-teplye-rolly js-scroll-to-cat-desktop" style="background-image: url('/media_root/categories/mini/menu-icon-tempura-hovered.png')" data-url="/menu/teplye-rolly/" data-hash="#cat-5">Теплые роллы</a>
                        </div>
                        <div class="swiper-slide" style="width: 58.9286px; margin-right: 30px;">
                            <a href="/wok/" class="big-menu-wok" style="background-image: url('https://www.sushi-profi.ru/static_root/images/wok-icon-hover.7aea0d22c268.png')">Вок</a>
                        </div>
                        <div class="swiper-slide" style="width: 58.9286px; margin-right: 30px;">
                            <a href="/menu/assorti-sety/" class=" big-menu-assorti-sety js-scroll-to-cat-desktop" style="background-image: url('/media_root/categories/mini/menu-icon-set-hovered.png')" data-url="/menu/assorti-sety/" data-hash="#cat-8">Ассорти-сеты</a>
                        </div>
                        <div class="swiper-slide" style="width: 58.9286px; margin-right: 30px;">
                            <a href="/menu/pizzas/" class=" big-menu-pizzas js-scroll-to-cat-desktop" style="background-image: url('/media_root/categories/mini/menu-icon-pizza3.png')" data-url="/menu/pizzas/" data-hash="#cat-23">Пиццы</a>
                        </div>
                        <div class="swiper-slide" style="width: 58.9286px; margin-right: 30px;">
                            <a href="/menu/vegetarianskie-blyuda/" class=" big-menu-vegetarianskie-blyuda js-scroll-to-cat-desktop" style="background-image: url('/media_root/categories/mini/menu-icon-vegan-hovered.png')" data-url="/menu/vegetarianskie-blyuda/" data-hash="#cat-26">Постное</a>
                        </div>
                        <div class="swiper-slide" style="width: 58.9286px; margin-right: 30px;">
                            <a href="/menu/sashimi/" class=" big-menu-sashimi js-scroll-to-cat-desktop" style="background-image: url('/media_root/categories/mini/menu-icon-sashimi-hovered.png')" data-url="/menu/sashimi/" data-hash="#cat-7">Сашими</a>
                        </div>
                        <div class="swiper-slide" style="width: 58.9286px; margin-right: 30px;">
                            <a href="/menu/kadzari/" class=" big-menu-kadzari js-scroll-to-cat-desktop" style="background-image: url('/media_root/categories/mini/menu-icon-kadzari-hovered.png')" data-url="/menu/kadzari/" data-hash="#cat-24">Кадзари</a>
                        </div>
                        <div class="swiper-slide" style="width: 58.9286px; margin-right: 30px;">
                            <a href="/menu/boks-sushi/" class=" big-menu-boks-sushi js-scroll-to-cat-desktop" style="background-image: url('/media_root/categories/mini/menu-icon-box-hovered.png')" data-url="/menu/boks-sushi/" data-hash="#cat-6">Бокс-суши</a>
                        </div>
                        <div class="swiper-slide" style="width: 58.9286px; margin-right: 30px;">
                            <a href="/menu/onigiri/" class=" big-menu-onigiri js-scroll-to-cat-desktop" style="background-image: url('/media_root/categories/mini/menu-icon-onigiri-hovered.png')" data-url="/menu/onigiri/" data-hash="#cat-15">Онигири</a>
                        </div>
                        <div class="swiper-slide" style="width: 58.9286px; margin-right: 30px;">
                            <a href="/menu/salaty/" class=" big-menu-salaty js-scroll-to-cat-desktop" style="background-image: url('/media_root/categories/mini/menu-icon-salads-hovered.png')" data-url="/menu/salaty/" data-hash="#cat-12">Салаты</a>
                        </div>
                        <div class="swiper-slide" style="width: 58.9286px; margin-right: 30px;">
                            <a href="/menu/supy/" class=" big-menu-supy js-scroll-to-cat-desktop" style="background-image: url('/media_root/categories/mini/menu-icon-soup-hovered.png')" data-url="/menu/supy/" data-hash="#cat-9">Супы</a>
                        </div>
                        <div class="swiper-slide" style="width: 58.9286px; margin-right: 30px;">
                            <a href="/menu/goriachee/" class=" big-menu-goriachee js-scroll-to-cat-desktop" style="background-image: url('/media_root/categories/mini/menu-icon-kebab-hovered.png')" data-url="/menu/goriachee/" data-hash="#cat-11">Горячее</a>
                        </div>
                        <div class="swiper-slide" style="width: 58.9286px; margin-right: 30px;">
                            <a href="/menu/deserty/" class=" big-menu-deserty js-scroll-to-cat-desktop" style="background-image: url('/media_root/categories/mini/menu-icon-dessert-hovered.png')" data-url="/menu/deserty/" data-hash="#cat-13">Десерты</a>
                        </div>
                        <div class="swiper-slide" style="width: 58.9286px; margin-right: 30px;">
                            <a href="/menu/detiam/" class=" big-menu-detiam js-scroll-to-cat-desktop" style="background-image: url('/media_root/categories/mini/menu-icon-kids-hovered.png')" data-url="/menu/detiam/" data-hash="#cat-16">Детям</a>
                        </div>
                        <div class="swiper-slide" style="width: 58.9286px; margin-right: 30px;">
                            <a href="/menu/napitki/" class=" big-menu-napitki js-scroll-to-cat-desktop" style="background-image: url('/media_root/categories/mini/menu-icon-beverage-hovered.png')" data-url="/menu/napitki/" data-hash="#cat-14">Напитки</a>
                        </div>
                        <div class="swiper-slide" style="width: 58.9286px; margin-right: 30px;">
                            <a href="/menu/sousy/" class=" big-menu-sousy js-scroll-to-cat-desktop" style="background-image: url('/media_root/categories/mini/menu-icon-sauce-hovered.png')" data-url="/menu/sousy/" data-hash="#cat-2">Соусы</a>
                        </div>
                        <div class="swiper-slide" style="width: 58.9286px; margin-right: 30px;">
                            <a href="/menu/servirovka/" class=" big-menu-servirovka js-scroll-to-cat-desktop" style="background-image: url('/media_root/categories/mini/menu-icon-dishes-hovered.png')" data-url="/menu/servirovka/" data-hash="#cat-19">Сервировка</a>
                        </div>
                    </div>
                    <div class="swiper-button-prev swiper-button-disabled" tabindex="0" role="button" aria-label="Previous slide" aria-disabled="true"></div>
                    <div class="swiper-button-next" tabindex="0" role="button" aria-label="Next slide" aria-disabled="false"></div>
                    <span class="swiper-notification" aria-live="assertive" aria-atomic="true"></span>
                </div>
            </div>
        </div>


        <footer class="footer">
            <div class="container">
                <p class="pull-left">&copy; <?= Html::encode(Yii::$app->name) ?> <?= date('Y') ?></p>

                <p class="pull-right"><?= Yii::powered() ?></p>
            </div>
        </footer>

    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>