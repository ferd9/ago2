<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(	
        'id'=>'empresa-form',        
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>

	<p class="note">Todos los campos <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

        <?php $e_ubigeo = Ubigeo::model()->findByAttributes(array('idubigeo'=>$person->ubigeo)) ?>

        <div class="row">
		<?php echo $form->labelEx($model,'ruc'); ?>
		<?php echo $form->textField($model,'ruc',array('size'=>20)); ?>
		<?php echo $form->error($model,'ruc'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($person,'nombre',array('label'=>'Razon Social')); ?>
		<?php echo $form->textField($person,'nombre',array('size'=>50,'value'=>$model->empresa0->nombre)); ?>
		<?php echo $form->error($person,'nombre'); ?>
	</div>

	<div class="row">
                <?php echo CHtml::activeLabel($model,'lgo'); ?>
                <?php echo CHtml::activeFileField($model, 'lgo'); ?>                
	</div>

        <div class="row">                
		<?php echo CHtml::hiddenField('oculto',MyController::campoHidden($model->idempresa)); ?>
	</div>

        <div class="row">                
		<?php echo $form->labelEx($lugar,'coddpto',array('label'=>'Departamento')); ?>
		<?php echo $form->dropDownList($lugar,'coddpto',Ubigeo::model()->getDepartamento(),array('options' => array($e_ubigeo->coddpto=>array('selected'=>true)),'ajax' => array('type' => 'POST','url' => CController::createUrl('ubigeo/provincia'),'update' => '#city_id' )),array('ajax' => array('type' => 'POST','url' => CController::createUrl('empresa/limpiar'),'update' => '#prov_id' ))) ;?>
		<?php echo $form->error($lugar,'coddpto'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($lugar,'codprov',array('label'=>'Provincia'));?>
		<?php echo CHtml::dropDownList('city_id','',$model->isNewRecord ? array('empty'=>'Seleccionar') : MyModel::updateProvincia($e_ubigeo->coddpto),array('options' => array($e_ubigeo->codprov=>array('selected'=>true)),'ajax' => array('type' => 'POST','url' => CController::createUrl('ubigeo/distrito'),'update' => '#prov_id' ))); ?>
		<?php echo $form->error($lugar,'codprov'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($lugar,'coddist',array('label'=>'Distrito')); ?>
		<?php echo CHtml::dropDownList('prov_id','',$model->isNewRecord ? array('empty'=>'Seleccionar') : MyModel::updateDistrito($e_ubigeo->coddpto, $e_ubigeo->codprov),array('options' => array($e_ubigeo->coddist=>array('selected'=>true)),'empty'=>'Seleccionar')); ?>
		<?php echo $form->error($lugar,'coddist'); ?>
	</div>

        <div class="row">
                <?php echo $form->labelEx($person,'direccion'); ?>
		<?php echo $form->textField($person,'direccion',array('size'=>50,'value'=>$model->empresa0->direccion)); ?>
		<?php echo $form->error($person,'direccion'); ?>
	</div>

        <div class="row">
                <?php echo $form->labelEx($person,'telefono'); ?>
		<?php echo $form->textField($person,'telefono',array('size'=>20,'value'=>$model->empresa0->telefono)); ?>
		<?php echo $form->error($person,'telefono'); ?>
	</div>

        <div class="row">
                <?php echo $form->labelEx($person,'fax'); ?>
		<?php echo $form->textField($person,'fax',array('size'=>20,'value'=>$model->empresa0->fax)); ?>
		<?php echo $form->error($person,'fax'); ?>
	</div>

        <div class="row">
                <?php echo $form->labelEx($person,'anexo'); ?>
		<?php echo $form->textField($person,'anexo',array('size'=>20,'value'=>$model->empresa0->anexo)); ?>
		<?php echo $form->error($person,'anexo'); ?>
	</div>

        <div class="row">
                <?php echo $form->labelEx($person,'celular'); ?>
		<?php echo $form->textField($person,'celular',array('size'=>20,'value'=>$model->empresa0->celular)); ?>
		<?php echo $form->error($person,'celular'); ?>
	</div>

        <div class="row">
                <?php echo $form->labelEx($person,'email'); ?>
		<?php echo $form->textField($person,'email',array('size'=>50,'value'=>$model->empresa0->email)); ?>
		<?php echo $form->error($person,'email'); ?>
	</div>

        <div class="row">
                <?php echo $form->labelEx($person,'zona'); ?>
		<?php echo $form->textField($person,'zona',array('size'=>50,'value'=>$model->empresa0->zona)); ?>
		<?php echo $form->error($person,'zona'); ?>
	</div>
        
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar'); ?>

	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->