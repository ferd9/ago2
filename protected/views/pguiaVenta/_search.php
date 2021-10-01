<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idplana'); ?>
		<?php echo $form->textField($model,'idplana'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idproducto'); ?>
		<?php echo $form->textField($model,'idproducto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nomproducto'); ?>
		<?php echo $form->textField($model,'nomproducto',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cantidad'); ?>
		<?php echo $form->textField($model,'cantidad'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'garantia'); ?>
		<?php echo $form->textField($model,'garantia'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nro_serie'); ?>
		<?php echo $form->textField($model,'nro_serie',array('size'=>60,'maxlength'=>70)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'codigo_barras'); ?>
		<?php echo $form->textField($model,'codigo_barras',array('size'=>60,'maxlength'=>70)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>60,'maxlength'=>300)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'almacen'); ?>
		<?php echo $form->textField($model,'almacen'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'usuario'); ?>
		<?php echo $form->textField($model,'usuario',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->