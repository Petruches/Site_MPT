<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Country */

$this->title = 'Создать список стран и популяции';
$this->params['breadcrumbs'][] = ['label' => 'Список стран и их популяция', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="country-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
