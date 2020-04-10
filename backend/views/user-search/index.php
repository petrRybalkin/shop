<?php

use yii\helpers\Html;
use yii\grid\GridView;
use common\models\User;
use common\models\UserSearch;

/* @var $this yii\web\View */
/* @var $searchModel common\models\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'username',
            'profile.name',
            'profile.phone',
            'profile.address',
            'email:email',
            [
                'attribute' => 'status',
                'filter' => User::statusList(),
                'format' => 'raw',
                'value' => function (User $model) {
                    return Html::a($model->getStatusTag(), ['view', 'id' => $model->id]);
                }
            ],
            'created_at:datetime',
            'updated_at:datetime',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
