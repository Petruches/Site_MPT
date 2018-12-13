<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Country */

$this->title = 'Изменение страны: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Список стран и популяции', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->code]];
$this->params['breadcrumbs'][] = 'Обновление';
?>
<div class="country-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
