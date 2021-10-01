<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'razon_social'); ?>
		<?php echo $form->textField($model,'razon_social',array('size'=>50,'maxlength'=>100)); ?>
	</div>

        <div class="row">
		<?php echo $form->label($model,'ruc'); ?>
		<?php echo $form->textField($model,'ruc',array('size'=>20,'maxlength'=>11)); ?>
	</div>

        <div class="row">
		<?php echo $form->label($model,'licencia_conducir'); ?>
		<?php echo $form->textField($model,'licencia_conducir',array('size'=>20,'maxlength'=>45)); ?>
	</div>

        <div class="row">
		<?php echo $form->label($model,'nro_soat'); ?>
		<?php echo $form->textField($model,'nro_soat',array('size'=>20,'maxlength'=>60)); ?>
	</div>

        <div class="row">
		<?php echo $form->label($model,'nro_placa'); ?>
		<?php echo $form->textField($model,'nro_placa',array('size'=>20,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'marca_vehiculo'); ?>
		<?php echo $form->textField($model,'marca_vehiculo',array('size'=>20,'maxlength'=>45)); ?>
	</div>					

	<div class="row">
		<?php echo $form->label($model,'usuario'); ?>
		<?php echo $form->textField($model,'usuario',array('size'=>20,'maxlength'=>50)); ?>
	</div>	

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->