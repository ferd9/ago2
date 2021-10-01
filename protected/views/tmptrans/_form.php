<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tmptrans-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idproducto'); ?>
		<?php echo $form->textField($model,'idproducto'); ?>
		<?php echo $form->error($model,'idproducto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nombreproducto'); ?>
		<?php echo $form->textField($model,'nombreproducto',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'nombreproducto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'preciocompra'); ?>
		<?php echo $form->textField($model,'preciocompra',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'preciocompra'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'preciosinigv'); ?>
		<?php echo $form->textField($model,'preciosinigv',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'preciosinigv'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'precioconigv'); ?>
		<?php echo $form->textField($model,'precioconigv',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'precioconigv'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'stockproducto'); ?>
		<?php echo $form->textField($model,'stockproducto'); ?>
		<?php echo $form->error($model,'stockproducto'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->