<?php

/* @var $this View */
/* @var $content string */

use frontend\components\JsonLDHelper;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;
use yii\widgets\Breadcrumbs;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use frontend\widgets\CategorySliderWidget;
use frontend\widgets\CategoryMobileWidget;
use frontend\widgets\CartWidget;
use common\models\Slider;
use frontend\widgets\SliderWidget;

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
           
        <div class="container">
            <div class="wrapper">
                <div class="header-bottom js-header-bottom clear">
                    <div class="container">
                        <div class="header-bottom__left">
                            <nav>
                                <ul class="clear">
                                    <li><a href="/" class="main-logo"></a></li>
                                    <li><a href="<?= Url::to(['/page/akcii']) ?>">Акции</a></li>
                                    <li><a href="<?= Url::to(['/delivery/dostavka-i-oplata']) ?>">Доставка</a></li>
                                    <li style="display:none"><a href="/reviews/">Отзывы</a></li>
                                    <li style="display:none"><a href="#" class="promocode-nav js-promocode-window">Промокод</a></li>
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
                                        <?php if(Yii::$app->user->isGuest): ?>
                                            <?= Html::a('Войти', ['/site/login']) ?>
                                            <?= Html::a('Регистрация', ['/site/signup']) ?>
                                        <?php else: ?>
                                            <?= Html::a('Выйти', ['/site/logout'], [
                                                'data-method' => 'POST'
                                            ]) ?>
                                        <?php endif; ?>
                                    </li>
                                    <li><?= CartWidget::widget(); ?></li>
                                </ul>
                            </nav>
                        </div>

                    </div>
                </div>

                <div class="bg-header">
                    <div class="header-wrap js-header-resp">

                        <?= CategoryMobileWidget::widget() ?>
                        
                    </div>

                    <section class="banner" style="margin-top: 70px;display:none;">
                        <div class="content">
                            <div class="action-resp" style="display:none;">
                                <?= SliderWidget::widget([
                                    'place' => Slider::PLACE_MAIN_TOP,
                                ]) ?>
                            </div>
                        </div>
                    </section>
                    <?php if(Yii::$app->controller->route == 'site/index'): ?>
                    <section class="actions hidden-sm-down" style="margin-top:-25px;">
                        <?= SliderWidget::widget([
                                    'place' => Slider::PLACE_MAIN_TOP,
                        ]) ?>
                    </section> 
                    <?php endif; ?>
                </div>
                

                <?= CategorySliderWidget::widget() ?>

                <div class="content index-categories">
                    <div class="clear">
                        <div class="change-view-xs right hidden-sm-up" style="margin-top:-20px;" data-t="None">
                            &nbsp;
                        </div>
                    </div>
                    <?= Breadcrumbs::widget([
                        'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
                    ]) ?>
                    <?= Alert::widget() ?>


                    <?= $content ?>

            </div>
        </div>

        <div class="footer">
            <footer>
                <div class="footer-top">
                    <div class="content">
                        <p style="text-align: center;">Кафе "Стойка" - профессиональный подход к японской кухне. Мы знаем толк в том что делаем.</p>
                        <p style="text-align: center;">И готовы поделиться этим с Вами. Доставка суши и хорошего настроения к Вам.</p>
                    </div>
                </div>
                <div class="footer-middle">
                    <div class="content">
                        <div class="list-menu">
                            <p>
                                <a href="/">Кафе "Стойка"</a> - доставка <a href="#">суши</a>, <a href="#">роллов</a>, <a href="#">бокс-суши</a>, <a href="#">онигири</a>, <a href="#">сашими</a>, <a href="#">ассорти-сетов суши и роллов</a>, <a href="#">салатов</a>, <a href="#">супов</a>, <a href="#">лапши вок</a>, <a href="#">пиццы</a>, <a href="#">горячих блюд</a> и <a href="#">десертов</a>.</p>
                            </div>
                        </div>
                    </div>
                    <div class="footer-bottom desktop">
                        <div class="content clear">
                            <div class="logo logo-footer"><div>
                                <a href="/"><?= Html::img('@web/img/logo-header3.png', ['alt'=>'logo']); ?></a>
                                <span>
                                    <span class="copy">©</span><span class="text">Кафе «Стойка» — <br> Доставка суши и <br> хорошего настроения. <?= date('Y') ?></span>
                                </span>
                            </div>
                        </div>
                        <div class="footer-bottom__social">
                            <div class="list-two-row clear">
                                <nav>
                                    <ul>
                                        <li style="display:none" class="footer-link-title"><a href="#">О компании</a></li>
                                        <li style="display:none" class="footer-link-title"><a href="#">Полезная информация</a></li>
                                        <li style="display:none">- <a href="#">Контакты</a></li>
                                        <li style="display:none">- <a href="#">Заказ суши</a></li>
                                        <li>- <a href="<?= Url::to(['/page/akcii']) ?>">Акции</a></li>
                                        <li style="display:none">- <a href="#">Суши на дом</a></li>
                                        <li style="display:none">- <a href="#">Наши стандарты</a></li>
                                        <li style="display:none">- <a href="#">Доставка суши</a></li>
                                        <li>- <a href="<?= Url::to(['/delivery/dostavka-i-oplata']) ?>">Доставка и Оплата</a></li>
                                        <li style="display:none">- <a href="#">История суши</a></li>
                                        <li style="display:none">- <a href="#">Отзывы</a></li>
                                        <li style="display:none">- <a href="#">Как есть суши?</a></li>
                                        <li style="display:none">- <a href="#">Вакансии</a></li>
                                        <li style="display:none">- <a href="#">Разновидности роллов</a></li>
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
                                    <li><a href="https://www.instagram.com//" target="_blank" rel="nofollow"><span class="icon icon-instagram"></span></a></li>
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
                                <li><a href="https://www.instagram.com//" target="_blank" rel="nofollow"><span class="icon icon-instagram"></span></a></li>
                            </ul>
                        </div>
                        <div class="list-two-row clear">
                            <nav>
                                <ul>
                                    <li style="display:none"><a href="#">О компании</a></li>
                                    <li style="display:none"><a href="#">Полезная информация</a></li>
                                    <li style="display:none"><a href="#">Контакты</a></li>
                                    <li style="display:none"><a href="#">Заказ суши</a></li>
                                    <li><a href="<?= Url::to(['/page/akcii']) ?>">Акции</a></li>
                                    <li style="display:none"><a href="#">Суши на дом</a></li>
                                    <li style="display:none"><a href="#">Наши стандарты</a></li>
                                    <li style="display:none"><a href="#">Доставка суши</a></li>
                                    <li><a href="<?= Url::to(['/delivery/dostavka-i-oplata']) ?>">Доставка и Оплата</a></li>
                                    <li style="display:none"><a href="#">История суши</a></li>
                                    <li style="display:none"><a href="#">Отзывы</a></li>
                                    <li style="display:none"><a href="#">Как есть суши?</a></li>
                                    <li style="display:none"><a href="#">Вакансии</a></li>
                                    <li style="display:none"><a href="#">Разновидности роллов</a></li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="footer-bottom__developer">
                        <a href="tel:+380666555773" class="number-developer">+38 (066) 655-57-73</a>
                        <a href="mailto:info@sushi-profi.ru" class="email-to">info@barstoyka.lg.ua</a>
                        <div class="footer-bottom__slogan">Бар «Стойка» — Доставка суши и хорошего настроения. <?= date('Y') ?></div>
                    </div>
                </div>
            </footer>
        </div> 


    <?php $this->endBody() ?>
        <script type="text/javascript">
            $(document).ready(function(){
                $('.header-resp__nav button').on('click', function() {
                    $('.navbar').css({'transition-duration': '0.3s', 'transform': 'translate(0px, 0px)'});
                });

                $('.navbar .menu-close').on('click', function() {
                    $('.navbar').css({'transition-duration': '0.3s', 'transform': 'translate(-280px, 0px)'});
                });
            });


            
        </script> 
    <!-- Initialize Swiper -->
        <script>
            var swiper = new Swiper('.swiper-container', {
              slidesPerView: 14,
              spaceBetween: 30,
              slidesPerGroup: 1,
              loop: false,
              loopFillGroupWithBlank: true,
              pagination: {
                el: '.swiper-pagination',
                clickable: true,
              },
              navigation: {
                nextEl: '.swiper-button-next',
                prevEl: '.swiper-button-prev',
              },
            });
        </script>
        <script type="text/javascript">
            $(document).delegate('*[data-toggle="lightbox"]', 'click', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox();
            });
        </script>
    </body>
</html>
<?php $this->endPage() ?>
