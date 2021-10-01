<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuario-form',
	'enableAjaxValidation'=>false,
)); ?>

   <?php /* $this->beginWidget('zii.widgets.jui.CJuiDialog'
        , array('options'=>array(
            'title'=>'Mi Ventana Modal'
            , 'modal'=>true
            , 'buttons'=>array('OK'=>'js:function(){$(this).dialog("close")}')
            ))
);

echo 'Ventana Modal';

$this->endWidget('zii.widgets.jui.CJuiDialog'); */
    ?>
   <?php $e_ubigeo = Ubigeo::model()->findByAttributes(array('idubigeo'=>$persona->ubigeo)) ?>
	<p class="note">Los campos <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>
        <?php echo $form->errorSummary($persona); ?>



        <div class="row">
		<?php echo $form->labelEx($model,'login'); ?>
		<?php echo $form->textField($model,'login', array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($model,'login'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'nivel',array('label'=>'Nivel de Acceso'));
                     $nivela = new CDbCriteria;
                     $nivela->order = 'descripcion asc';
                     $listNivel =CHtml::listData(Nivel::model()->findAll($nivela),'idnivel','descripcion');
                ?>
		<?php echo $form->dropDownList($nivel,'idnivel',$listNivel) ;?>
		<?php echo $form->error($nivel,'idnivel'); ?>
	</div>



<?php /*

	<div class="row">
		 echo $form->labelEx($model,'nivel'); ?>
		<?php echo $form->textField($model,'nivel'); ?>
		<?php echo $form->error($model,'nivel'); ?>
	</div>

*/ ?>
        <div class="row">
		<?php echo $form->labelEx($persona,'nombre',array('label'=>'Nombres')); ?>
		<?php echo $form->textField($persona,'nombre', array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($persona,'nombre'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($persona,'apaterno',array('label'=>'Primer Apellido')); ?>
		<?php echo $form->textField($persona,'apaterno', array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($persona,'apaterno'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($persona,'amaterno',array('label'=>'Segundo Apellido')); ?>
		<?php echo $form->textField($persona,'amaterno', array('size'=>45,'maxlength'=>45)); ?>
		<?php echo $form->error($persona,'amaterno'); ?>
	</div>



          <div class="row">
                <?php echo $form->labelEx($persona,'E-mail'); ?>
		<?php echo $form->textField($persona,'email', array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($persona,'email'); ?>
	</div>

        <div class="row">
                <?php echo $form->labelEx($persona,'Telefono'); ?>
		<?php echo $form->textField($persona,'telefono', array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($persona,'telefono'); ?>
	</div>

        <div class="row">
                <?php echo $form->labelEx($persona,'Celular'); ?>
		<?php echo $form->textField($persona,'celular', array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($persona,'celular'); ?>
	</div>

        <div class="row">
                <?php echo $form->labelEx($persona,'Direccion'); ?>
		<?php echo $form->textField($persona,'direccion', array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($persona,'direccion'); ?>
	</div>

        <div class="row">
                <?php echo $form->labelEx($persona,'Zona'); ?>
		<?php echo $form->textField($persona,'zona', array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($persona,'zona'); ?>
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
                <?php echo $form->labelEx($persona,'Sexo'); ?>
		<?php echo $form->radioButtonList($persona,'sexo',Persona::getSexo(),array('separator'=>'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;','labelOptions'=>array('style'=>'display:inline')))?>
	</div>

        <div class="row">
                <?php echo $form->labelEx($persona,'Estado Civil'); ?>
		<?php echo $form->dropDownList($persona,'estado_civil',Persona::getEstadoCivil()); ?>
		<?php echo $form->error($persona,'estado_civil'); ?>
	</div>
<?php /*
	<div class="row">
		 echo $form->labelEx($model,'usuario');
		<?php echo $form->hiddenField($model,'usuario'); ?>
		<?php echo $form->error($model,'usuario'); ?>
	</div>
*/?>
        <div class="row">
		<?php echo $form->labelEx($almacen,'almacen');
                     $almacena = new CDbCriteria;
                     $almacena->order = 'nombre asc';
                     $listalmacen =CHtml::listData(Almacen::model()->findAll($almacena),'idalmacen','nombre');
                ?>
		<?php echo $form->dropDownList($almacen,'idalmacen',$listalmacen) ;?>
		<?php echo $form->error($almacen,'idalmacen'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'numero_documento'); ?>
		<?php echo $form->textField($model,'numero_documento',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'numero_documento'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contra1',array('label'=>'Contraseña')); ?>
		<?php echo $form->passwordField($model,'contra1',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'contra1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'contra2',array('label'=>'Confirmar Contraseña')); ?>
		<?php echo $form->passwordField($model,'contra2',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'contra2'); ?>
	</div>

	<div class="row">
		<?php /* echo $form->labelEx($model,'estado'); */?>
		<?php echo $form->hiddenField($model,'estado',array('size'=>1,'maxlength'=>1)); ?>
		<?php echo $form->error($model,'estado'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Grabar' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->