<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idproducto'); ?>
		<?php echo $form->textField($model,'idproducto'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idcategoria'); ?>
		<?php echo $form->textField($model,'idcategoria'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idmarca'); ?>
		<?php echo $form->textField($model,'idmarca'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idmodelo'); ?>
		<?php echo $form->textField($model,'idmodelo'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idtipo_moneda'); ?>
		<?php echo $form->textField($model,'idtipo_moneda'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'idigv'); ?>
		<?php echo $form->textField($model,'idigv'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>60,'maxlength'=>250)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'precio_compra'); ?>
		<?php echo $form->textField($model,'precio_compra',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'precio_sin_igv'); ?>
		<?php echo $form->textField($model,'precio_sin_igv',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'precio_con_igv'); ?>
		<?php echo $form->textField($model,'precio_con_igv',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descuento'); ?>
		<?php echo $form->textField($model,'descuento',array('size'=>9,'maxlength'=>9)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'unidad_medida'); ?>
		<?php echo $form->textField($model,'unidad_medida',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'foto'); ?>
		<?php echo $form->textField($model,'foto',array('size'=>45,'maxlength'=>45)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'estado'); ?>
		<?php echo $form->textField($model,'estado',array('size'=>1,'maxlength'=>1)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->