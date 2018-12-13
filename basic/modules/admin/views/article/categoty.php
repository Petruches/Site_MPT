<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Категория';
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= Html::dropDownList('categoty', $selectedCategory/*$article->categoty->ID*/, $categories, ['class' => 'form-control']) ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить категорию', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>