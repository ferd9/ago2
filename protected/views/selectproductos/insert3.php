<div class="form">
<?php
Yii::app()->clientScript->registerScript('selectProduct', "
function selectProduct() {
$('#mydialog').dialog('close');
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
		<?php  echo $form->labelEx($model,'nro_serie'); ?>
		<?php echo $form->textField($model,'nro_serie',array('size'=>10,'maxlength'=>70)); ?>
		<?php echo $form->error($model,'nro_serie'); ?>
	</div>

	<div class="column">
		<?php echo $form->labelEx($model,'codigo_barras'); ?>
		<?php echo $form->textField($model,'codigo_barras',array('size'=>10,'maxlength'=>70)); ?>
		<?php  echo $form->error($model,'codigo_barras'); ?>
	</div>
</div>
<div class="clear"> </div>


<div class="inline">
     <div class="column">
		<?php echo $form->labelEx($model,'cantidad'); ?>
		<?php echo $form->textField($model,'cantidad',array('size'=>3)); ?>
		<?php echo $form->error($model,'cantidad'); ?>
	</div>

	<div class="column">
		<?php  echo $form->labelEx($model,'garantia'); ?>
		<?php echo $form->textField($model,'garantia'); ?>
		<?php  echo $form->error($model,'garantia'); ?>
	</div>
</div>
<div class="clear"> </div>
	<div class="row">
		<?php echo $form->labelEx($model,'descripcion',array('label'=>'Descripcion')); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>30,'maxlength'=>300)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
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
