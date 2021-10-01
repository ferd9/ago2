<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'modelo-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'idcategoria'); ?>
		<?php echo $form->dropDownList($model,'idcategoria', MyModel::getCategoria() ,array('options' => array($model->idcategoria=>array('selected'=>true)),'ajax' => array('type' => 'POST','url' => CController::createUrl('modelo/marca'),'update' => '#city_id' )),array('ajax' => array('type' => 'POST','url' => CController::createUrl('modelo/limpiar'),'update' => '#city_id' ))) ;?>
		<?php echo $form->error($model,'idcategoria'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'idmarca');?>
		<?php echo CHtml::dropDownList('city_id','', array('options' => array(),'empty'=>'Seleccionar')); ?>
		<?php echo $form->error($model,'idmarca'); ?>
	</div>	

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->