<?php

use app\models\Tag;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use yii2mod\selectize\Selectize;

/* @var $this yii\web\View */
/* @var $model app\models\Cuisine */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cuisine-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tagNames')->widget(Selectize::className(), [
        'items' => ArrayHelper::map(Tag::find()->all(), 'name', 'name'),
        'pluginOptions' => [
            'plugins' => ['remove_button'],
            'delimiter' => ',',
            'persist' => false,
            'createOnBlur' => false,
            'create' => true,
        ],
        'options' => [
            'multiple' => true,
            'class' => '',
            'prompt'=> '...'
        ]
    ]); ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
