<?php

use common\models\Category;
use yii\helpers\Url;
use frontend\components\JsonLDHelper;
use yii\helpers\Html;
use yii\web\View;
use frontend\assets\AppAsset;
use common\widgets\Alert;
use frontend\widgets\CartWidget;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/**
 * @var $this yii\web\View
 * @var $categories Category[]
 */

?>   
    
<header>
    <div class="content">
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
    <div class="navbar-logo"></div>
    <div class="navbar-wrap">
        <ul class="navbar-menu">
                <li class="phone-link"><a href="tel:+380666555773">+38 (066) 655-57-73</a></li>
                <li class="gift-link"><a href="<?= Url::to(['/page/akcii']) ?>">Акции</a></li>
                <li class="delivery-link"><a href="<?= Url::to(['/delivery/dostavka-i-oplata']) ?>">О доставке</a></li>
        </ul>
        <hr>
        <ul class="navbar-menu">
          <?php foreach ($categories as $category): ?>
            <li>
              <a href="<?= Url::to($category->getUrl()) ?>" class="big-menu-top-10 js-scroll-to-cat-desktop" style="background-image: url('<?= $category->getThumbFileUrl('image', 'thumb'); ?>')"  data-url="<?= Url::to($category->getUrl()) ?>" data-hash="#cat-<?= $category->id ?>"><?= $category->title ?></a>
              </li>
          <?php endforeach; ?>
        </ul>
        <hr>
        <ul class="navbar-othermenu guest">
            <?php if(Yii::$app->user->isGuest): ?>
                <li><<?= Html::a('Войти', ['/site/login']) ?></li>
                <li><<?= Html::a('Регистрация', ['/site/signup']) ?></li>
            <?php else: ?>
                <li><?= Html::a('Выйти', ['/site/logout'], [
                    'data-method' => 'POST'
                ]) ?></li>
                <li><?= Html::a('Личный кабинет', ['/profile/index']) ?></li>
                <?php endif; ?>
            
            <li style="display:none"><a href="#">Интересное</a></li>
            <li style="display:none"><a href="#">Отзывы</a></li>
            <li style="display:none"><a href="#">О нас</a></li>
        </ul>
    </div>
</div>