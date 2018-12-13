<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\modules\admin\views\article\tags;

/* @var $this yii\web\View */
/* @var $model app\models\Article */
/* @var $form yii\widgets\ActiveForm */
$this->title = 'Категория';
?>

<div class="article-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= Html::dropDownList('tags', $selectedTags, $tags, ['class' => 'form-control', 'multiple'=>true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Добавить тег', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>