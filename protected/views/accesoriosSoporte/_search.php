<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idacce_soporte'); ?>
		<?php echo $form->textField($model,'idacce_soporte'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cantidad_soporte'); ?>
		<?php echo $form->textField($model,'cantidad_soporte',array('size'=>6,'maxlength'=>6)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion_soporte'); ?>
		<?php echo $form->textField($model,'descripcion_soporte',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'serie_soporte'); ?>
		<?php echo $form->textField($model,'serie_soporte',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codigobarras_soporte'); ?>
		<?php echo $form->textField($model,'codigobarras_soporte',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usuario_sopore'); ?>
		<?php echo $form->textField($model,'usuario_sopore',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->