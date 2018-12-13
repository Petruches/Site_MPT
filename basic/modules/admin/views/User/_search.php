<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'ID') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'fam') ?>

    <?= $form->field($model, 'otch') ?>

    <?= $form->field($model, 'username') ?>

    <?php // echo $form->field($model, 'pass') ?>

    <?php // echo $form->field($model, 'tel') ?>

    <?php // echo $form->field($model, 'mail') ?>

    <?php // echo $form->field($model, 'isAdmin') ?>

    <div class="form-group">
        <?= Html::submitButton('Поиск', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Сбросить', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
