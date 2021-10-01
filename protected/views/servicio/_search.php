<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idservicio'); ?>
		<?php echo $form->textField($model,'idservicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombreservicio'); ?>
		<?php echo $form->textField($model,'nombreservicio',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'precioservicio'); ?>
		<?php echo $form->textField($model,'precioservicio',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->