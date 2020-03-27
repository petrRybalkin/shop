<?php

/* @var $this View */
/* @var $content string */

use frontend\components\JsonLDHelper;
use yii\helpers\Html;
use yii\helpers\Url;
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
        <!-- <header> -->
             <?php
            // NavBar::begin([
            //     'brandLabel' => Yii::$app->name,
            //     'brandImage' => Url::to('@web/images/logo-header3.png'),
            //     'brandUrl' => Yii::$app->homeUrl,
            //     'options' => [
            //         'class' => 'navbar-inverse navbar-fixed-top',
            //     ],
            // ]);
            // $menuItems = [
            //     //['label' => 'Home', 'url' => ['/site/index']],
            //     ['label' => 'Доставка и Оплата', 'url' => ['/']],
            //     ['label' => 'О нас', 'url' => ['/site/about']],
            //     ['label' => 'Contact', 'url' => ['/site/contact']],
            // ];
            // if (Yii::$app->user->isGuest) {
            //     $menuItems[] = ['label' => 'Войти', 'url' => ['/site/login']];
            //     $menuItems[] = ['label' => 'Регистрация', 'url' => ['/site/signup']];
            // } else {
            //     $menuItems[] = '<li>'
            //         . Html::beginForm(['/site/logout'], 'post')
            //         . Html::submitButton(
            //             'Logout (' . Yii::$app->user->identity->username . ')',
            //             ['class' => 'btn btn-link logout']
            //         )
            //         . Html::endForm()
            //         . '</li>';
            // }
            // echo Nav::widget([
            //     'options' => ['class' => 'navbar-nav navbar-right'],
            //     'items' => $menuItems,
            // ]);
            // NavBar::end();

            // echo CartWidget::widget();
            ?>
            <!-- <div class="container">
                <?//= CategorySliderWidget::widget() ?>
            </div> -->
       <!--  </header> -->
        <!-- <div class="wrap">
            
            <div class="container">
                <?//= Breadcrumbs::widget([
                  //  'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                //]) ?>
                <?//= Alert::widget() ?>
                <?//= $content ?>
            </div>
        </div> -->

        <div class="container">
            <div class="wrapper">
                <div class="header-bottom js-header-bottom clear">
                    <div class="container">
                        <div class="header-bottom__left">
                            <nav>
                                <ul class="clear">
                                    <li><a href="/" class="main-logo"></a></li>
                                    <li><a href="<?= Url::to(['/']) ?>">Акции</a></li>
                                    <li><a href="<?= Url::to(['/']) ?>">Доставка</a></li>
                                    <!-- <li><a href="/reviews/">Отзывы</a></li>
                                    <li><a href="#" class="promocode-nav js-promocode-window">Промокод</a></li> -->
                                    <li class="contact-items">
                                        <a href="tel:+380666555773"><strong class="main-phone">+38 (066) 655-57-73</strong></a>
                                        <a href="#" class="phone-call- phone-call-link">заказать звонок</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="header-bottom__right">
                            <nav>
                                <ul class="clear">
                                    <li class="no-register">
                                        <a href="<?= Url::to(['/site/login']) ?>">Войти</a>
                                        <a href="<?= Url::to(['/site/signup']) ?>">Регистрация</a>
                                    </li>
                                    <li><?= CartWidget::widget(); ?></li>
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>

                <div class="bg-header">
                    <div class="header-wrap js-header-resp">
                    <!-- <div class="header-wrap js-header-resp resp-sticky" style="position: fixed; top: 0px;"> -->
                        <header>
                            <div class="content"><!-- new responsive header -->
                                <div class="header-resp hidden-lg-up">
                                    <div class="header-resp__logo">
                                        <a href="/"><?= Html::img('@web/img/logo-header3.png', ['alt'=>'logo']); ?></a>
                                    </div>
                                    <div class="header-resp__nav">
                                        <button type="button" class="ssm-toggle-nav navbar-toggle active ssm-nav-visible" data-toggle="collapse">
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                            <span class="icon-bar"></span>
                                        </button>
                                    </div>
                                    <div class="header-resp__cart">
                                         <?= CartWidget::widget(); ?>
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
                                    <li class="phone-link"><a href="tel:+380666555773">+38 (066) 655-57-73</a></li>
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
                    <!-- <section class="banner" style="margin-top: 70px;">
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
                    </section> -->
                    <!-- <section class="actions hidden-sm-down" style="margin-top: 70px;">
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
                                                    <div style="position:absolute; top:60%; left:48%; font-size:2vw; color:#ac0808;">за <strong style="font-size:3vw; color:#ac0808;">170</strong> грн.
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
                    </section> -->
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

                <div class="content index-categories">
                    <div class="clear">
                        <div class="change-view-xs right hidden-sm-up" style="margin-top:-20px;" data-t="None">
                            <span class="icon icon-fz28 icon-sort5 active" data-view="mob-grid" style="display:inline-block !important; margin-right:5px;"></span>
                            <a href="#" class="catview__btn catview--list js-catview-list " data-view="mob-list" style="display:inline-block !important;"></a>
                        </div>
                    </div>
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>
                    <?= Alert::widget() ?>
                    <?= $content ?>

                    <!-- <div class="products" id="cat-30">
                        <p class="products__title">ТОП-10</p>
                        <span class="products__description products__description--top-10"></span>
                        <ul class="list-product clear five None list-cat-top-10 wok-product-list-">
                            <li class="product with-accent lucky-product-False" data-href="/menu/top-10/set-postnyi-36-sht-680g/" data-id="211" data-image="/media_root/products/mini/Assorti-Postnoe_Min_gCTAC7V.png" data-title="Сет Постный [36 шт., 680г.]" data-is-lucky="False" data-price="342" data-price-half="" data-description="Ассорти для вегетарианцов и людей, соблюдающих пост со скидкой 50% - роллы с авокадо, огурцом, болгарским перцем, помидором, маринованным дайконом и маринованными водорослями. Дополнительные скидки на данный сет не распространяются." data-weight="680" data-unique_code="663" data-is-active="true" data-recommendation-url="" data-disallow_discount="true">
                                <a href="/menu/top-10/set-postnyi-36-sht-680g/" class="product__capture">
                                    <span class="product__img">
                                        <img class="lazy loaded" src="/media_root/products/mini/Assorti-Postnoe_Min_gCTAC7V.png" data-src="/media_root/products/mini/Assorti-Postnoe_Min_gCTAC7V.png" alt="Сет Постный [36 шт., 680г.]" data-title="Ассорти для вегетарианцов и людей, соблюдающих пост со скидкой 50% - роллы с авокадо, огурцом, болгарским перцем, помидором, маринованным дайконом и маринованными водорослями. Дополнительные скидки на данный сет не распространяются." data-was-processed="true">
                                    </span>
                                    <p class="product__title" data-title="Сет Постный [36 шт., 680г.]: ">Сет Постный [36 шт., 680г.]</p>
                                    <div class="product__info"></div>
                                </a>
                                <div class="product__descr" style="display:none;">
                                    Ассорти для вегетарианцов и людей, соблюдающих пост со скидкой 50% - роллы с авокадо, огурцом, болгарским перцем, помидором, маринованным дайконом и маринованными водорослями. Дополнительные скидки на данный сет не распространяются.
                                </div>
                                <div class="product__weight" style="display:none;">680 г.</div>
                                <div class="product-buy">
                                    <p class="product-price product-price--top-10"><span>342</span> p.</p>
                                    <span class="counter">
                                        <input type="text" name="counter" value="1">
                                        <i class="ui-spinner-button ui-spinner-up plus"><span></span></i>
                                        <i class="ui-spinner-button ui-spinner-down minus"><span></span></i>
                                    </span>
                                    <span class="icon icon-cart icon-fz22 add-to-basket add-product-to-basket"></span>
                                </div>
                                <div class="label" style="background-color:#ff0000">Скидка 50%</div>
                            </li>
                        </ul>
                    </div> -->

                </div>

                <section style="margin-top: 70px;">
                    <div class="content index-bottom-content">
                        <p>&nbsp;</p>
                        <h2 style="text-align: center;font-size:24px;">Заказать суши вкусно и выгодно у нас</h2>
                        <p>&nbsp;</p>
                        <table align="center" border="0" cellpadding="1" cellspacing="1">
                            <tbody>
                                <tr>
                                    <td style="text-align: center; background-color: rgb(255, 255, 255);">
                                        <p>&nbsp;</p>
                                        <p><?= Html::img('@web/img/icon-2.png', ['alt'=>'', 'style'=>'width: 48px; height: 47px;']); ?></p>
                                        <p><?= Html::img('@web/img/icon-line.png', ['alt'=>'', 'style'=>'width: 300px; height: 20px;']); ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: rgb(255, 255, 255);">
                                        <p style="text-align: center;">&nbsp;</p>
                                        <p style="text-align: center;"><strong>День рождения с <?= Html::encode($this->title); ?>!</strong></p>
                                        <p style="text-align: center;">&nbsp;</p>
                                        <p style="text-align: center;">При заказе на день рождения скидка 20%</p>
                                        <p style="text-align: center;">&nbsp;</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p>&nbsp;</p>
                        <table align="center" border="0" cellpadding="1" cellspacing="1">
                            <tbody>
                                <tr>
                                    <td style="text-align: center; background-color: rgb(255, 255, 255);">
                                        <p>&nbsp;</p>
                                        <p><?= Html::img('@web/img/icon-4.png', ['alt'=>'', 'style'=>'width: 39px; height: 52px;']); ?></p>
                                        <p><?= Html::img('@web/img/icon-line.png', ['alt'=>'', 'style'=>'width: 300px; height: 20px;']); ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: rgb(255, 255, 255);">
                                        <p style="text-align: center;">&nbsp;</p>
                                        <p style="text-align: center;"><strong>Подарки при каждом заказе</strong></p>
                                        <p style="text-align: center;">&nbsp;</p>
                                        <p style="text-align: center;">При заказе на сумму от 200грн., 250грн., 400грн., 500грн..</p>
                                        <p style="text-align: center;">&nbsp;</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <p>&nbsp;</p>
                        <table align="center" border="0" cellpadding="1" cellspacing="1">
                            <tbody>
                                <tr>
                                    <td style="text-align: center; background-color: rgb(255, 255, 255);">
                                        <p>&nbsp;</p>
                                        <p><?= Html::img('@web/img/icon-3.png', ['alt'=>'', 'style'=>'width: 45px; height: 51px;']); ?></p>
                                        <p><?= Html::img('@web/img/icon-line.png', ['alt'=>'', 'style'=>'width: 300px; height: 20px;']); ?></p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="background-color: rgb(255, 255, 255);">
                                        <p style="text-align: center;">&nbsp;</p>
                                        <p style="text-align: center;"><strong>Счастливый час каждый день!</strong></p>
                                        <p style="text-align: center;">&nbsp;</p>
                                        <p style="text-align: center;">Ежедневно с 13:00 до 14:30 скидка до 50%</p>
                                        <p style="text-align: center;">на одно из популярных блюд</p>
                                        <p style="text-align: center;">&nbsp;</p>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <h1 class="title-step">Доставка суши и роллов в Северодонецке!</h1>
                        <div style="font-size: 16px;">
                            <p><?= Html::img('@web/img/main1.png', ['alt'=>'', 'style'=>'width: 156px; height: 100px; float: left; margin-left: 10px; margin-right: 10px;']); ?>
                                Компания <?= Html::encode($this->title); ?> занимается доставкой блюд японской кухни, суши и роллов, лапши вок, а также пиццы уже много лет. За это время клиентами нашей компании стали многие тысячи человек, а большинство из них - постоянными гостями нашего сайта и заказывают доставку суши и пиццы уже постоянно.</p>
                            <p>&nbsp;</p>
                            <p>Наша доставка суши популярна среди клиентов, потому что мы работаем в первую очереди для них, чтобы доставлять не только суши и роллы, но и хорошее настроение.</p><p>&nbsp;</p><p>Для доставки суши и вок, так же как и для доставки пиццы или роллов, мы с любовью готовим и тщательно подходим к выбору поставщиков продуктов, которые используются в приготовлении блюд, бережно храним и щепетильно относимся к свежести и качеству каждого ингредиента, который будет использован в роллах, суши или пицце.</p>
                            <p>&nbsp;</p>
                            <p>Вы можете заказать в <?= Html::encode($this->title); ?> роллы и суши с доставкой по Северодонецке - как в офис, так и домой, будучи абсолютно уверенными в надежности Вашего выбора.</p>
                            <p>&nbsp;</p>
                            <h3 style="text-align: center;"><span style="color:#A52A2A;">Мы начинаем принимать заказы с 10-00 и работаем до 23-00 ежедневно.</span></h3>
                            <p>&nbsp;</p>
                            <p><?= Html::img('@web/img/main2-2.png', ['alt'=>'', 'style'=>'width: 156px; height: 100px; float: left; margin-left: 10px; margin-right: 10px;']); ?>Наши повара начинают готовить заказанные вами роллы и суши только после того, как операторы примут заказ и уточнят все нюансы заказа. Заказ выходит, как говорится, «из-под ножа», никаких полуфабрикатов и заготовок роллов, суши или пиццы мы не используем в работе. Поэтому все наши клиенты могут быть уверены в свежести и качестве, хоть такое приготовление и занимает немного больше времени, чем при работе с заготовками.
                            <span style="color:#A52A2A;"><strong>Обычное время доставки заказа составляет 45...90 минут с учётом времени приготовления</strong></span>. Горячие блюда мы доставляем в специальных термосумках.</p>
                            <p>&nbsp;</p>
                            <p><?= Html::img('@web/img/main3-2.png', ['alt'=>'', 'style'=>'width:156px;height:100px;float:left;margin-left:10px;margin-right:10px;']); ?></p>
                            <p>Заказывать суши, роллы и пиццу в <?= Html::encode($this->title); ?> не только просто, но и выгодно!</p>
                            <p>&nbsp;</p>
                            <p>Каждый клиент, зарегистрировавшийся у нас на сайте, становится участником скидочной и бонусной программ, и с каждым следующим заказом получает скидку – сначала 2%, потом 3%, 5% и 8% - после седьмого заказа.</p>
                            <p>&nbsp;</p>
                            <h3 style="text-align: center;"><span style="color:#A52A2A;"><strong>Все заказы комплектуются необходимым количеством соевого соуса, имбиря и васаби по количеству персон. </strong></span></h3>
                            <h3 style="text-align: center;"><span style="color:#A52A2A;"><strong>Это бесплатно для вас – за наш счёт, и всегда будет бесплатно!</strong></span></h3>
                            <p>&nbsp;</p>
                            <p><?= Html::img('@web/img/present2.png', ['alt'=>'', 'style'=>'width:125px;height:125px;margin-left: 20px; margin-right: 20px; float: left;']); ?>Кроме того, нашим клиентам доступны все наши Акции – «Счастливый час» (когда одно из популярных блюд предлагается со скидкой до 50%), «День рождения» (скидка 20%), «второй ролл в подарок» (акция проводится на ограниченный перечень роллов) и многие другие.</p>
                            <p>&nbsp;</p>
                            <p>А также при оформлении заказа суши и роллов на страничке «Мой обед» (в корзине) вы можете<span style="color:#A52A2A;"><strong> ввести промо-код и получить при этом ДОПОЛНИТЕЛЬНЫЙ подарок или скидку</strong></span> Подробнее об акциях читайте <a href="/gifts/">здесь</a>.</p>
                            <p>&nbsp;</p>
                            Заказать суши, роллы и пиццу с доставкой у нас не только просто и выгодно – но и удобно! Вы можете повторить любой ваш заказ в один клик, заказывая суши и роллы с сайта, мобильного приложения или сообщив о таком желании оператору по телефону. Оплатить заказ вы можете при получении – наличными курьеру, или банковской картой или электронными деньгами – через сайт при оформлении заказать

                            <p>&nbsp;</p>
                            <p><?= Html::img('@web/img/main5-2.png', ['alt'=>'', 'style'=>'width: 125px; height: 80px; margin-left: 20px; margin-right: 20px; float: left;']); ?>И мы действительно не только заботимся о наших клиентах, но стараемся для них. Именно поэтому заказывая суши и роллы в <?= Html::encode($this->title) ?> вы можете попросить не класть какой-то ингредиент, разложить ваш заказ по контейнерам так чтобы было удобнее разделить приятную трапезу с друзьями и коллегами. И насладиться нашими большими, щедрыми порциями – ДА, мы не нарезаем роллы на большое количество кусочков только чтобы изобразить видимость количества. Наши роллы и суши весят действительно столько, сколько указано в меню на сайте.</p>
                            <p>&nbsp;</p>
                            <h3 style="text-align: center;"><span style="color:#A52A2A;">Ваши суши и вок, вместе с роллами и вкусной пиццей ждут вашего заказа!</span></h3>
                            <p>&nbsp;</p>
                        </div>
                    </div>
                </section>

            </div>
        </div>

        <div class="footer">
            <footer>
                <div class="footer-top">
                    <div class="content">
                        <p style="text-align: center;"><?= Html::encode($this->title); ?> - профессиональный подход к японской кухне. Мы знаем толк в том что делаем.</p>
                        <p style="text-align: center;">И готовы поделиться этим с Вами. Доставка суши и хорошего настроения к Вам.</p>
                    </div>
                </div>
                <div class="footer-middle">
                    <div class="content">
                        <div class="list-menu">
                            <p>
                                <a href="/"><?= Html::encode($this->title); ?></a> - доставка <a href="/menu/sushi/">суши</a>, <a href="/menu/rolly/">роллов</a>, <a href="/menu/boks-sushi/">бокс-суши</a>, <a href="/menu/onigiri/">онигири</a>, <a href="/menu/sashimi/">сашими</a>, <a href="/menu/assorti-sety/">ассорти-сетов суши и роллов</a>, <a href="/menu/salaty/">салатов</a>, <a href="/menu/supy/">супов</a>, <a href="/wok/">лапши вок</a>, <a href="/menu/pizzas/">пиццы</a>, <a href="/menu/goriachee/">горячих блюд</a> и <a href="/menu/deserty/">десертов</a>.</p>
                            </div>
                        </div>
                    </div>
                    <div class="footer-bottom desktop">
                        <div class="content clear">
                            <div class="logo logo-footer"><div>
                                <a href="/"><?= Html::img('@web/img/logo-header3.png', ['alt'=>'logo']); ?></a>
                                <span>
                                    <span class="copy">©</span><span class="text">«<?= Html::encode($this->title); ?>» — <br> Доставка суши и <br> хорошего настроения. <?= date('Y') ?></span>
                                </span>
                            </div>
                        </div>
                        <div class="footer-bottom__social">
                            <div class="list-two-row clear">
                                <nav>
                                    <ul>
                                        <li class="footer-link-title"><a href="/about/">О компании</a></li>
                                        <li class="footer-link-title"><a href="/interesting/fakty-o-yaponii/">Полезная информация</a></li>
                                        <li>- <a href="/contacts/">Контакты</a></li>
                                        <li>- <a href="/zakaz-sushi/">Заказ суши</a></li>
                                        <li>- <a href="/gifts/">Акции</a></li>
                                        <li>- <a href="/sushi-na-dom/">Суши на дом</a></li>
                                        <li>- <a href="/standarts/">Наши стандарты</a></li>
                                        <li>- <a href="/dostavka-sushi/">Доставка суши</a></li>
                                        <li>- <a href="/delivery/">Доставка</a> / <a href="/payment/">Оплата</a></li>
                                        <li>- <a href="/interesting/fakty-o-yaponii/istoriya-vozniknoveniya-sushi/">История суши</a></li>
                                        <li>- <a href="/reviews/">Отзывы</a></li>
                                        <li>- <a href="/interesting/fakty-o-yaponii/kak-pravilno-est-sushi/">Как есть суши?</a></li>
                                        <li>- <a href="/vacancy/">Вакансии</a></li>
                                        <li>- <a href="/interesting/fakty-o-yaponii/raznovidnosti-rollov/">Разновидности роллов</a></li>
                                    </ul>
                                </nav>
                            </div>
                        </div>
                        <div class="footer-bottom__application">
                            <p class="application-title">&nbsp;</p>
                        </div>
                        <div class="footer-bottom__developer">
                            <a href="tel:+380666555773" class="number-developer">+38 (066) 655-57-73</a>
                            <div class="delivery-text">Доставка с 9:00 до 23:00</div>
                            <a href="mailto:info@sushi-profi.ru" class="email-to">info@barstoyka.lg.ua</a>
                            <div class="social clear">
                                <ul>
                                    <li><a href="https://twitter.com/" target="_blank" rel="nofollow"><span class="icon icon-twitter"></span></a></li>
                                    <li><a href="https://www.facebook.com/" target="_blank" rel="nofollow"><span class="icon icon-facebook icon-fb"></span></a></li>
                                    <li><a href="https://vk.com/" target="_blank" rel="nofollow"><span class="icon icon-vkontakte icon-vk"></span></a></li>
                                    <li><a href="https://www.instagram.com//" target="_blank" rel="nofollow" class="icon-ig"></a></li>
                                </ul>
                            </div>
                            <a href="/sitemap/" class="sitemap-link">Карта сайта</a>
                        </div>
                    </div>
                </div>
            </footer>
        </div>

        <div class="footer--resp hidden-lg-up">
            <footer>
                <div class="footer-bottom">
                    <div class="footer-bottom__social">
                        <div class="social clear">
                            <ul>
                                <li><a href="https://twitter.com/" target="_blank" rel="nofollow"><span class="icon icon-twitter"></span></a></li>
                                <li><a href="https://www.facebook.com/" target="_blank" rel="nofollow"><span class="icon icon-facebook icon-fb"></span></a></li>
                                <li><a href="https://vk.com/" target="_blank" rel="nofollow"><span class="icon icon-vkontakte icon-vk"></span></a></li>
                                <li><a href="https://www.instagram.com//" target="_blank" rel="nofollow" class="icon-ig"></a></li>
                            </ul>
                        </div>
                        <div class="list-two-row clear">
                            <nav>
                                <ul>
                                    <li><a href="/about/">О компании</a></li>
                                    <li><a href="/interesting/fakty-o-yaponii/">Полезная информация</a></li>
                                    <li><a href="/contacts/">Контакты</a></li>
                                    <li><a href="/zakaz-sushi/">Заказ суши</a></li>
                                    <li><a href="/gifts/">Акции</a></li>
                                    <li><a href="/sushi-na-dom/">Суши на дом</a></li>
                                    <li><a href="/standarts/">Наши стандарты</a></li>
                                    <li><a href="/dostavka-sushi/">Доставка суши</a></li>
                                    <li><a href="/delivery/">Доставка</a> / <a href="/payment/">Оплата</a></li>
                                    <li><a href="/interesting/fakty-o-yaponii/istoriya-vozniknoveniya-sushi/">История суши</a></li>
                                    <li><a href="/reviews/">Отзывы</a></li>
                                    <li><a href="/interesting/fakty-o-yaponii/kak-pravilno-est-sushi/">Как есть суши?</a></li>
                                    <li><a href="/vacancy/">Вакансии</a></li>
                                    <li><a href="/interesting/fakty-o-yaponii/raznovidnosti-rollov/">Разновидности роллов</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="footer-bottom__developer">
                        <a href="tel:+380666555773" class="number-developer">+38 (066) 655-57-73</a>
                        <a href="mailto:info@sushi-profi.ru" class="email-to">info@barstoyka.lg.ua</a>
                        <div class="footer-bottom__slogan">«<?= Html::encode($this->title); ?>» — Доставка суши и хорошего настроения. <?= date('Y') ?></div>
                    </div>
                </div>
            </footer>
        </div>

    <?php $this->endBody() ?>
    </body>
</html>
<?php $this->endPage() ?>