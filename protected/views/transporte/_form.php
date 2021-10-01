<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'transporte-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Todos los campos <span class="required">*</span>son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'razon_social'); ?>
		<?php echo $form->textField($model,'razon_social',array('size'=>50,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'razon_social'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'ruc'); ?>
		<?php echo $form->textField($model,'ruc',array('size'=>20,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'ruc'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'licencia_conducir'); ?>
		<?php echo $form->textField($model,'licencia_conducir',array('size'=>20,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'licencia_conducir'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'nro_soat'); ?>
		<?php echo $form->textField($model,'nro_soat',array('size'=>20,'maxlength'=>60)); ?>
		<?php echo $form->error($model,'nro_soat'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'nro_placa'); ?>
		<?php echo $form->textField($model,'nro_placa',array('size'=>20,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'nro_placa'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'marca_vehiculo'); ?>
		<?php echo $form->textField($model,'marca_vehiculo',array('size'=>50,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'marca_vehiculo'); ?>
	</div>	

	<div class="row">
		<?php echo $form->labelEx($model,'certificado_inscripcion'); ?>
		<?php echo $form->textField($model,'certificado_inscripcion',array('size'=>50,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'certificado_inscripcion'); ?>
	</div>		

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->