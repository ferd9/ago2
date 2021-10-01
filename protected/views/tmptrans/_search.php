<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idtmptras'); ?>
		<?php echo $form->textField($model,'idtmptras'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idproducto'); ?>
		<?php echo $form->textField($model,'idproducto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nombreproducto'); ?>
		<?php echo $form->textField($model,'nombreproducto',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'preciocompra'); ?>
		<?php echo $form->textField($model,'preciocompra',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'preciosinigv'); ?>
		<?php echo $form->textField($model,'preciosinigv',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'precioconigv'); ?>
		<?php echo $form->textField($model,'precioconigv',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'stockproducto'); ?>
		<?php echo $form->textField($model,'stockproducto'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->