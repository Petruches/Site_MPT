<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use app\models\LoginForm;
use app\models\User;
use yii\base\Model;
use yii\captcha\Captcha;

$this->title = 'Вход';
//$this->params['breadcrumbs'][] = $this->title;
?>
<body>
<div class="site-login">
    <div style="margin-left: 500px;">

        <h1 style="margin-left: 150px;"><?= Html::encode($this->title) ?></h1>

        <p style="margin-left: 150px;">Пожалуйста введите логин и пароль:</p>

    <?php $form = ActiveForm::begin(/*[
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]*/); ?>


        <?= $form->field($model, 'username')->textInput(['class' => 'inputlog1']) ?>

        <?= $form->field($model, 'pass')->passwordInput(['class' => 'inputlog2']) ?>

       <!-- <?= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) ?> -->

        <div class="form-group">
                <?= Html::submitButton('Вход', ['class' => 'butreg', 'name' => 'login-button']) ?>
        </div>

    </div>


</div>
    <?php ActiveForm::end(); ?>
</body>