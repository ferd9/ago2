<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tipo-moneda-form',
	'enableAjaxValidation'=>false,
)); ?>


	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion',array('label'=>'Moneda')); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cambio',array('label'=>'Tipo de Cambio')); ?>
		<?php echo $form->textField($model,'cambio',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'cambio'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->