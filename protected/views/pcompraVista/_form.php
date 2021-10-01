<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'pcompra-vista-form',
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
		<?php echo $form->labelEx($model,'nomproducto'); ?>
		<?php echo $form->textField($model,'nomproducto',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'nomproducto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'precio'); ?>
		<?php echo $form->textField($model,'precio',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'precio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idmoneda'); ?>
		<?php echo $form->textField($model,'idmoneda'); ?>
		<?php echo $form->error($model,'idmoneda'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'moneda'); ?>
		<?php echo $form->textField($model,'moneda',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'moneda'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nro_serie'); ?>
		<?php echo $form->textField($model,'nro_serie',array('size'=>60,'maxlength'=>70)); ?>
		<?php echo $form->error($model,'nro_serie'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codigo_barras'); ?>
		<?php echo $form->textField($model,'codigo_barras',array('size'=>60,'maxlength'=>70)); ?>
		<?php echo $form->error($model,'codigo_barras'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'idtipo_adquisicion'); ?>
		<?php echo $form->textField($model,'idtipo_adquisicion'); ?>
		<?php echo $form->error($model,'idtipo_adquisicion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_adquisicion'); ?>
		<?php echo $form->textField($model,'tipo_adquisicion',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'tipo_adquisicion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cambio'); ?>
		<?php echo $form->textField($model,'cambio',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'cambio'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'garantia'); ?>
		<?php echo $form->textField($model,'garantia'); ?>
		<?php echo $form->error($model,'garantia'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cantidad'); ?>
		<?php echo $form->textField($model,'cantidad'); ?>
		<?php echo $form->error($model,'cantidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'almacen'); ?>
		<?php echo $form->textField($model,'almacen'); ?>
		<?php echo $form->error($model,'almacen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'usuario'); ?>
		<?php echo $form->textField($model,'usuario',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'usuario'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'accion_save'); ?>
		<?php echo $form->textField($model,'accion_save',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'accion_save'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->