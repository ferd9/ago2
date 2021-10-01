<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'precio-compra-tmp-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'sutbotal'); ?>
		<?php echo $form->textField($model,'sutbotal',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'sutbotal'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'igv'); ?>
		<?php echo $form->textField($model,'igv',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'igv'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'total'); ?>
		<?php echo $form->textField($model,'total',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'total'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descuento'); ?>
		<?php echo $form->textField($model,'descuento',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'descuento'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->