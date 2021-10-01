<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cliente-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>
      <?php $e_ubigeo = Ubigeo::model()->findByAttributes(array('idubigeo'=>$persona->ubigeo)) ?>
	<?php /*<div class="row">
		 echo $form->labelEx($model,'cliente'); ?>
		<?php echo $form->textField($model,'cliente'); ?>
		<?php echo $form->error($model,'cliente');
	</div>
        */?>
        <div class="row">
		<?php echo $form->labelEx($model,'numero_documento',array('label'=>'RUC')); ?>
		<?php echo $form->textField($model,'numero_documento',array('size'=>11,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'numero_documento'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($persona,'nombre',array('label'=>'Razon Social')); ?>
		<?php echo $form->textField($persona,'nombre', array('size'=>60,'maxlength'=>200,'value'=>$model->cliente0->nombre)); ?>
		<?php echo $form->error($persona,'nombre'); ?>
	</div>
          <div class="row">
                <?php echo $form->labelEx($persona,'E-mail'); ?>
		<?php echo $form->textField($persona,'email', array('size'=>40,'maxlength'=>40,'value'=>$model->cliente0->email)); ?>
		<?php echo $form->error($persona,'email'); ?>
	</div>

        <div class="row">
                <?php echo $form->labelEx($persona,'Telefono'); ?>
		<?php echo $form->textField($persona,'telefono', array('size'=>20,'maxlength'=>20,'value'=>$model->cliente0->telefono)); ?>
		<?php echo $form->error($persona,'telefono'); ?>
	</div>

        <div class="row">
                <?php echo $form->labelEx($persona,'Celular'); ?>
		<?php echo $form->textField($persona,'celular', array('size'=>20,'maxlength'=>20,'value'=>$model->cliente0->celular)); ?>
		<?php echo $form->error($persona,'celular'); ?>
	</div>
         <div class="row">
                <?php echo $form->labelEx($persona,'Fax'); ?>
		<?php echo $form->textField($persona,'fax', array('size'=>20,'maxlength'=>20,'value'=>$model->cliente0->fax)); ?>
		<?php echo $form->error($persona,'fax'); ?>
	</div>
        <div class="row">
                <?php echo $form->labelEx($persona,'Anexo'); ?>
		<?php echo $form->textField($persona,'anexo', array('size'=>20,'maxlength'=>20,'value'=>$model->cliente0->anexo)); ?>
		<?php echo $form->error($persona,'anexo'); ?>
	</div>
        <div class="row">
                <?php echo $form->labelEx($persona,'Direccion'); ?>
		<?php echo $form->textField($persona,'direccion', array('size'=>50,'maxlength'=>50,'value'=>$model->cliente0->direccion)); ?>
		<?php echo $form->error($persona,'direccion'); ?>
	</div>

        <div class="row">
                <?php echo $form->labelEx($persona,'Zona'); ?>
		<?php echo $form->textField($persona,'zona', array('size'=>40,'maxlength'=>40,'value'=>$model->cliente0->zona)); ?>
		<?php echo $form->error($persona,'zona'); ?>
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
		<?php /*echo $form->labelEx($model,'idtipo_cliente'); */?>
		<?php echo $form->hiddenField($model,'idtipo_cliente', array('value'=>$tipoccc)); ?>
		<?php /*echo $form->error($model,'idtipo_cliente'); */?>
	</div>

	
	<div class="row">
		<?php /*echo $form->labelEx($model,'estado'); */?>
		<?php echo $form->hiddenField($model,'estado',array('size'=>1,'maxlength'=>1)); ?>
		<?php /*echo $form->error($model,'estado');*/ ?>
	</div>

	<div class="row">
		<?php /*echo $form->labelEx($model,'usuario'); */?>
		<?php echo $form->hiddenField($model,'usuario',array('size'=>50,'maxlength'=>50, 'value'=>Yii::app()->user->name)); ?>
		<?php /*echo $form->error($model,'usuario'); */?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'puntos'); ?>
		<?php echo $form->textField($model,'puntos'); ?>
		<?php echo $form->error($model,'puntos'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Grabar' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->