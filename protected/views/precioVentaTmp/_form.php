<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'precio-venta-tmp-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'descuento'); ?>
		<?php echo $form->textField($model,'descuento',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'descuento'); ?>
	</div>

<?php
echo $mensaje;
?>
    
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Aplicar' : 'Aplicar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->