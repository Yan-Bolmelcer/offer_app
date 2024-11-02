<?php

use yii\helpers\Html;
use yii\bootstrap4\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Offer $model */
/** @var yii\widgets\ActiveForm $form */

?>

<div class="offer-form">

    <?php $form = ActiveForm::begin([
        'options' => ['validateOnSubmit' => true],
    ]); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true])->label('Название оффера') ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true])->label('Email представителя') ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true])->label('Телефон представителя') ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
