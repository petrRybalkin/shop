<?php

use backend\assets\VueJsProductListAsset;
use common\models\ProductList;
use common\models\ProductListItem;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\View;
use yii\widgets\ActiveForm;

/* @var $this View */
/* @var $model ProductList */


$this->registerJsFile(YII_DEBUG
    ? 'https://cdn.jsdelivr.net/npm/vue/dist/vue.js'
    : 'https://cdn.jsdelivr.net/npm/vue');

$list = $model->getProductListItems()->all();
$default = [
    [
        'id' => 'new_' . random_int(1, 100000),
        'title' => '',
        'sort' => 0,
        'price' => 0,
        'image' => '/img/empty.png',
        'product_1c_id' => '',
    ]
];
$items = $list ? ArrayHelper::getColumn($list, function (ProductListItem $item) {
    $return = $item->attributes;
    $return['image'] = $item->getThumbFileUrl('image', 'thumb', '/img/empty.png');
    return $return;
}) : $default;
$this->registerJsVar('listItems', $items);
VueJsProductListAsset::register($this);
?>


<div class="product-list-form">

    <?php $form = ActiveForm::begin([
        'enableClientValidation' => false,
        'options' => [
            'enctype' => 'multipart/form-data',
        ],
    ]); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'required')->checkbox() ?>

    <div class="panel panel-info">
        <div class="panel-heading">Состав</div>
        <div class="panel-body" id="product-items">
            <ul class="list-group">

                <li class="list-group-item">
                    <div class="row" style="font-weight: bold;">
                        <div class="col-md-4">
                            Фото
                        </div>
                        <div class="col-md-3">
                            Название
                        </div>
                        <div class="col-md-2">
                            Цена
                        </div>
                        <div class="col-md-1">
                            1C ID
                        </div>
                        <div class="col-md-1">
                            Сортировка
                        </div>
                    </div>
                </li>

                <li class="list-group-item" v-for="(item, index) in items" :key="item.id">

                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="sr-only">Фото</label>
                                <input class="form-control" placeholder="Фото" type="file"
                                       :name="'items[' + item.id + '][image]'"
                                       accept=".png, .jpg, .jpeg">
                                <img :src="item.image" width="182" height="119">
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="sr-only">Заголовок</label>
                                <input class="form-control" placeholder="Название"
                                       :name="'items[' + item.id + '][title]'" v-model="item.title">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="form-group">
                                <label class="sr-only">Цена</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" placeholder="Цена"
                                           :name="'items[' + item.id + '][price]'" v-model="item.price">
                                    <div class="input-group-addon">UAH</div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label class="sr-only">1C ID</label>
                                <div class="input-group">
                                    <input type="number" class="form-control" placeholder="1C ID"
                                           :name="'items[' + item.id + '][product_1c_id]'" v-model="item.product_1c_id">
                                </div>
                            </div>
                        </div>
                        <div class="col-md-1">
                            <div class="form-group">
                                <label class="sr-only">Сортировка</label>
                                <input type="number" class="form-control" placeholder="Сортировка"
                                       :name="'items[' + item.id + '][sort]'" v-model="item.sort">
                            </div>
                        </div>
                        <div class="col-md-1">
                            <a href="javascript:;" class="btn btn-danger btn-sm" @click="rmItem(index)">
                                <span class="glyphicon glyphicon-remove" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>

                </li>

                <li class="list-group-item" style="text-align: right;">
                    <a href="javascript:;" class="btn btn-success" @click="addItem">
                        <span class="glyphicon glyphicon-plus" aria-hidden="true"></span> Добавить
                    </a>
                </li>
            </ul>

        </div>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
