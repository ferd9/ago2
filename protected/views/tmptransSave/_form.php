<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tmptrans-save-form',
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->hiddenField($model,'idproducto',array('value'=>$tmp->idproducto)); ?>
		<?php echo $form->hiddenField($model,'nombreproducto',array('size'=>60,'maxlength'=>200,'value'=>$tmp->nombreproducto)); ?>
		<?php echo $form->hiddenField($model,'preciocompra',array('size'=>9,'maxlength'=>9,'value'=>$tmp->preciocompra)); ?>
		<?php echo $form->hiddenField($model,'preciosinigv',array('size'=>9,'maxlength'=>9,'value'=>$tmp->preciosinigv)); ?>
		<?php echo $form->hiddenField($model,'precioconigv',array('size'=>9,'maxlength'=>9,'value'=>$tmp->precioconigv)); ?>
		
	</div>

	<div class="row">
                <?php echo "<p><strong>Stock Actual: " .$tmp->stockproducto."</strong></p><br>";?>
		<?php echo $form->labelEx($model,'stockproducto',array('label'=>"Cantidad")); ?>
		<?php echo $form->textField($model,'stockproducto'); ?>
		<?php echo $form->error($model,'stockproducto'); ?>
                <?php echo "<br><p><strong>" .$mjs."</strong></p><br>";?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Añadir' : 'Añadir'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->