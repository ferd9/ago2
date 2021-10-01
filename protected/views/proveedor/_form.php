<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'proveedor-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

        <?php $e_ubigeo = Ubigeo::model()->findByAttributes(array('idubigeo'=>$persona->ubigeo)) ?>

	<div class="row">
		<?php echo $form->labelEx($model,'ruc'); ?>
		<?php echo $form->textField($model,'ruc',array('size'=>20,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'ruc'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($persona,'nombre',array('label'=>'Razon Social')); ?>
		<?php echo $form->textField($persona,'nombre',array('size'=>'50','value'=>$model->proveedor0->nombre)); ?>
		<?php echo $form->error($persona,'nombre'); ?>
	</div>	

	<div class="row">
		<?php echo $form->labelEx($model,'nombre_contacto'); ?>
		<?php echo $form->textField($model,'nombre_contacto',array('size'=>50,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'nombre_contacto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion_producto'); ?>
		<?php echo $form->textField($model,'descripcion_producto',array('size'=>50,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'descripcion_producto'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($ubigeo,'coddpto',array('label'=>'Departamento')); ?>
		<?php echo $form->dropDownList($ubigeo,'coddpto',Ubigeo::model()->getDepartamento(),array('options' => array($e_ubigeo->coddpto=>array('selected'=>true)),'ajax' => array('type' => 'POST','url' => CController::createUrl('ubigeo/provincia'),'update' => '#city_id' )),array('ajax' => array('type' => 'POST','url' => CController::createUrl('empresa/limpiar'),'update' => '#prov_id' ))) ;?>
		<?php echo $form->error($ubigeo,'coddpto'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($ubigeo,'codprov',array('label'=>'Provincia'));?>
		<?php echo CHtml::dropDownList('city_id','',$model->isNewRecord ? array('empty'=>'Seleccionar') : MyModel::updateProvincia($e_ubigeo->coddpto),array('options' => array($e_ubigeo->codprov=>array('selected'=>true)),'ajax' => array('type' => 'POST','url' => CController::createUrl('ubigeo/distrito'),'update' => '#prov_id' ))); ?>
		<?php echo $form->error($ubigeo,'codprov'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($ubigeo,'coddist',array('label'=>'Distrito')); ?>
		<?php echo CHtml::dropDownList('prov_id','',$model->isNewRecord ? array('empty'=>'Seleccionar') : MyModel::updateDistrito($e_ubigeo->coddpto, $e_ubigeo->codprov),array('options' => array($e_ubigeo->coddist=>array('selected'=>true)),'empty'=>'Seleccionar')); ?>
		<?php echo $form->error($ubigeo,'coddist'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($persona,'direccion'); ?>
		<?php echo $form->textField($persona,'direccion',array('size'=>'50','value'=>$model->proveedor0->direccion)); ?>
		<?php echo $form->error($persona,'direccion'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($persona,'celular'); ?>
		<?php echo $form->textField($persona,'celular',array('size'=>'20','value'=>$model->proveedor0->celular)); ?>
		<?php echo $form->error($persona,'celular'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($persona,'telefono'); ?>
		<?php echo $form->textField($persona,'telefono',array('size'=>'20','value'=>$model->proveedor0->telefono)); ?>
		<?php echo $form->error($persona,'telefono'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($persona,'anexo'); ?>
		<?php echo $form->textField($persona,'anexo',array('size'=>'20','value'=>$model->proveedor0->anexo)); ?>
		<?php echo $form->error($persona,'anexo'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($persona,'fax'); ?>
		<?php echo $form->textField($persona,'fax',array('size'=>'20','value'=>$model->proveedor0->fax)); ?>
		<?php echo $form->error($persona,'fax'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($persona,'email'); ?>
		<?php echo $form->textField($persona,'email',array('size'=>'50','value'=>$model->proveedor0->email)); ?>
		<?php echo $form->error($persona,'email'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($persona,'zona'); ?>
		<?php echo $form->textField($persona,'zona',array('size'=>'50','value'=>$model->proveedor0->zona)); ?>
		<?php echo $form->error($persona,'zona'); ?>
	</div>




	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Grabar' : 'Actualizar'); ?>
	</div>



<?php $this->endWidget(); ?>

</div><!-- form -->