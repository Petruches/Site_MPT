<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>
<?php $form = ActiveForm::begin();?>

<?=$form->field($model,'name'); ?>
<?=$form->field($model,'email'); ?> 
<?=$form->field($model,'passw')->passwordInput(); ?> 
<?=$form->field($model,'passw1')->passwordInput(); ?> 

<div class="form-group"> 
<?= Html::submitButton('Отправить',['class' => 'btn btn-primary']); ?> 
</div> 
<?php ActiveForm::end();?>