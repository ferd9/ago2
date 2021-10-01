<div class="form">

<?php //e cho
if($producto != null){
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'save-us-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->hiddenField($model,'idproducto',array('value'=>$producto->idproducto)); ?>
		<?php echo $form->error($model,'idproducto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nomproducto'); ?>
		<?php echo $form->textField($model,'nomproducto',array('value'=>$producto->descripcion,'size'=>60,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'nomproducto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'precio'); ?>
		<?php echo $form->textField($model,'precio',array('value'=>$producto->precio_con_igv,'size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'precio'); ?>
	</div>

	<div class="row">
                <?php $typeMoney = TipoMoneda::model()->findByAttributes(array('idtipo_moneda'=>$producto->idtipo_moneda));?>
		<?php echo $form->hiddenField($model,'idmoneda',array('value'=>$typeMoney->idtipo_moneda)); ?>
		<?php echo $form->error($model,'idmoneda'); ?>
	</div>

	<div class="row">                
		<?php echo $form->labelEx($model,'moneda'); ?>
		<?php echo $form->textField($model,'moneda',array('value'=>$typeMoney->descripcion,'size'=>20,'maxlength'=>20)); ?>
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
		<?php //echo $form->hiddenField($model,'idtipo_adquisicion'); ?>
		<?php //echo $form->error($model,'idtipo_adquisicion'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_adquisicion'); ?>
		<?php echo $form->dropDownList($model,'tipo_adquisicion',array("1"=>'Compra',"2"=>'Obsequio')); ?>
		<?php echo $form->error($model,'tipo_adquisicion'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'idtipo_ingreso'); ?>
		<?php //echo $form->textField($model,'idtipo_ingreso',array('size'=>1,'maxlength'=>1)); ?>
		<?php //echo $form->error($model,'idtipo_ingreso'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'tipo_ingreso'); ?>
		<?php echo $form->dropDownList($model,'tipo_ingreso',array("Venta"=>'venta',"Servicio"=>'Servicio')); ?>
		<?php echo $form->error($model,'tipo_ingreso'); ?>
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

	<div class="row buttons">
		<?php //echo CHtml::submitButton($model->isNewRecord ? 'Registrar Venta' : 'Save'); ?>
                 <?php echo CHtml::ajaxButton ("Vender Producto",
          CController::createUrl('/selectproductos/saveProductos'),
          array('type' => 'POST',            
               'update'=>'#datos'
        ));
                ?>
	</div>

<?php $this->endWidget(); }?>
        <div id="datos"></div>
</div><!-- form -->
