<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cuisine */

$this->title = 'Добавить виды кухни';
$this->params['breadcrumbs'][] = ['label' => 'Виды кухни', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cuisine-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
