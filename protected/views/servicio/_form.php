<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'servicio-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nombreservicio',array('label'=>'Servicio')); ?>
		<?php echo $form->textField($model,'nombreservicio',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'nombreservicio'); ?>
	</div>
        <div class="row">
		<?php echo $form->labelEx($model,'idtipo_moneda',array('label'=>'Tipo Moneda'));
                     $tipomonedad = new CDbCriteria;
                     $tipomonedad->order = 'descripcion asc';
                     $listatipomoneda =CHtml::listData(TipoMoneda::model()->findAll($tipomonedad),'idtipo_moneda','descripcion');
                ?>
		<?php echo $form->dropDownList($model,'idtipo_moneda',$listatipomoneda) ;?>
		<?php echo $form->error($model,'idtipo_moneda'); ?>
	</div>
	<div class="row">
		<?php echo $form->labelEx($model,'precioservicio',array('label'=>'Precio')); ?>
		<?php echo $form->textField($model,'precioservicio',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'precioservicio'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->