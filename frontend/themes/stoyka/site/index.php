<?php

use backend\models\Settings;
use frontend\widgets\MainPageProductsWidget;
use yii\helpers\Html;
use yii\helpers\Url;

/* @var $this yii\web\View */

Settings::seo();

?>


    <?= MainPageProductsWidget::widget() ?>


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
            <p>Наша доставка суши популярна среди клиентов, потому что мы работаем в первую очереди для них, чтобы доставлять не только суши и роллы, но и хорошее настроение.</p>
            <p>&nbsp;</p>
            <p>Для доставки суши и вок, так же как и для доставки пиццы или роллов, мы с любовью готовим и тщательно подходим к выбору поставщиков продуктов, которые используются в приготовлении блюд, бережно храним и щепетильно относимся к свежести и качеству каждого ингредиента, который будет использован в роллах, суши или пицце.</p>
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
