<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CuisineSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Виды кухни';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuisine-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить вид кухни', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'layout' => "{items}\n{summary}\n{pager}",
        'columns' => [
//            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'id',
                'headerOptions' => ['class' => 'text-center', 'style' => 'width: 80px;'],
                'contentOptions' => ['class' => 'text-center']
            ],
            'name',
            [
                'attribute' => 'tagNames',
                'value' => function($model) {
                    if($model->tags) {
                        $html = "";
                        foreach ($model->tags as $tag) {
                            $html .= "<span class='label label-info'>".$tag->name."</span> ";
                        }

                        return $html;
                    }

                    return null;
                },
                'format' => 'html'
            ],

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '<div class="btn-group">{update} {delete}</div>',
                'buttonOptions' => ['class' => 'btn btn-xs btn-default'],
                'headerOptions' => ['class' => 'text-center', 'style' => 'width: 120px;'],
                'contentOptions' => ['class' => 'text-center']
            ],
        ],
    ]); ?>


</div>
