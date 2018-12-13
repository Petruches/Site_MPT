<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

$this->title = 'Регистрация';
?>
<body>
	<div style="margin-left: 500px">
<?php $form = ActiveForm::begin();?>	
	<div>
<h1 style="margin-left: 130px;">Регистрация</h1>		
<?=$form->field($model,'name')->textInput(['class' => 'inputreg1']); ?>
<?=$form->field($model,'fam')->textInput(['class' => 'inputreg2']); ?>
<?=$form->field($model,'otch')->textInput(['class' => 'inputreg3']); ?>
<?=$form->field($model,'username')->textInput(['class' => 'inputreg4']); ?>
<?=$form->field($model,'pass')->passwordInput(['class' => 'inputreg5']); ?>
<?=$form->field($model,'tel')->textInput(['class' => 'inputreg6']); ?>
<?=$form->field($model,'mail')->textInput(['class' => 'inputreg7']); ?>

  <div class="form-group">
    <?= Html::submitButton('Регистрация',['class' => 'butlog']); ?>
  </div>
 
</div>
</div>
</body>
<?php ActiveForm::end();?>