<div class="form">
<?php
Yii::app()->clientScript->registerScript('selectProduct', "
function selectProduct() {
$('#mydialog2').dialog('close');
}
");
?>
<?php //e cho
if($producto != null){
$form=$this->beginWidget('CActiveForm', array(
	'id'=>'save-us-form',
	'enableAjaxValidation'=>false,
)); ?>
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->hiddenField($model,'idproducto',array('value'=>$producto->idproducto)); ?>
		<?php echo $form->error($model,'idproducto'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'nomproducto',array('label'=>'Producto')); ?>
		<?php echo $form->textField($model,'nomproducto',array('value'=>$producto->descripcion,'size'=>50,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'nomproducto'); ?>
	</div>

<div class="inline">
     <div class="column">
		<?php echo $form->labelEx($model,'precio'); ?>
		<?php echo $form->textField($model,'precio',array('value'=>$producto->precio_con_igv,'size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'precio'); ?>
	</div>

	<div class="column">
                <?php $typeMoney = TipoMoneda::model()->findByAttributes(array('idtipo_moneda'=>$producto->idtipo_moneda));?>
		<?php echo $form->hiddenField($model,'idmoneda',array('value'=>$typeMoney->idtipo_moneda)); ?>
		<?php echo $form->error($model,'idmoneda'); ?>
	</div>

	<div class="column">
		<?php echo $form->labelEx($model,'moneda'); ?>
		<?php
                $monedaaa = $typeMoney->idtipo_moneda;
                echo $form->dropDownList($model,'moneda',TipoMoneda::getTipoMoneda2(), array('options' => array($monedaaa=>array('selected'=>true)))); ?>
		<?php echo $form->error($model,'moneda'); ?>
	</div>

	<div class="column">
		<?php /* echo $form->labelEx($model,'nro_serie');*/ ?>
		<?php echo $form->hiddenField($model,'nro_serie',array('size'=>10,'maxlength'=>70)); ?>
		<?php /*echo $form->error($model,'nro_serie');*/ ?>
	</div>

	<div class="column">
		<?php /* echo $form->labelEx($model,'codigo_barras'); */?>
		<?php echo $form->hiddenField($model,'codigo_barras',array('size'=>10,'maxlength'=>70)); ?>
		<?php /* echo $form->error($model,'codigo_barras'); */?>
	</div>
</div>
<div class="clear"> </div>
	<div class="row">
		<?php //echo $form->hiddenField($model,'idtipo_adquisicion'); ?>
		<?php //echo $form->error($model,'idtipo_adquisicion'); ?>
	</div>


<div class="inline">
     <div class="column">
		<?php echo $form->labelEx($model,'cantidad'); ?>
		<?php echo $form->textField($model,'cantidad',array('size'=>3)); ?>
		<?php echo $form->error($model,'cantidad'); ?>
	</div>

	<div class="column">
		<?php echo $form->labelEx($model,'tipo_adquisicion'); ?>
		<?php echo $form->dropDownList($model,'tipo_adquisicion',array("1"=>'Compra',"2"=>'Obsequio')); ?>
		<?php echo $form->error($model,'tipo_adquisicion'); ?>
	</div>

	<div class="column">
		<?php //echo $form->labelEx($model,'idtipo_ingreso'); ?>
		<?php //echo $form->textField($model,'idtipo_ingreso',array('size'=>1,'maxlength'=>1)); ?>
		<?php //echo $form->error($model,'idtipo_ingreso'); ?>
	</div>


	<div class="column">
		<?php /* echo $form->labelEx($model,'garantia');*/ ?>
		<?php echo $form->hiddenField($model,'garantia'); ?>
		<?php /* echo $form->error($model,'garantia'); */?>
	</div>
</div>
<div class="clear"> </div>
	<div class="row">
		<?php /*echo $form->labelEx($model,'descripcion',array('label'=>'Descripcion(Servicio)')); */?>
		<?php echo $form->hiddenField($model,'descripcion',array('size'=>30,'maxlength'=>300)); ?>
		<?php /*echo $form->error($model,'descripcion'); */?>
	</div>



	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Añadir Producto' : 'Añadir Producto'); ?>
                 <?php /*echo CHtml::ajaxButton ("Vender Producto",
          CController::createUrl('/selectproductos/saveProductos'),
          array('type' => 'POST',
               'update'=>'#datos'
        ));*/
                ?>
	</div>

<?php $this->endWidget(); }?>
        <div id="datos"></div>
</div><!-- form -->
