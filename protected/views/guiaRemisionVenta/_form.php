<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'guia-remision-venta-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Todos los campos<span class="required">*</span>son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>
        <br>
<?php
$fecha=date('Y-m-d');
$hora=date('h:i:s');
?>

	<div class="row">
		<?php echo $form->labelEx($model,'idtransporte',array('label'=>'Transporte')); ?>
		<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array('model'=>$model,'attribute'=>'idtransporte','source'=>  Transporte::getListTransporte(),'options'=>array('minLength'=>'2',),'htmlOptions'=>array( 'style'=>'height:20px;','size'=>'80px'),)); ?>
		<?php echo $form->error($model,'idtransporte'); ?>
	</div>
       

	<div class="row">
		<?php echo $form->labelEx($model,'idcliente',array('label'=>'Cliente')); ?>
		<?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array('model'=>$model,'attribute'=>'idcliente','source'=>Cliente::getListClientes(),'options'=>array('minLength'=>'2',),'htmlOptions'=>array( 'style'=>'height:20px;','size'=>'80px'),)); ?>
		<?php echo $form->error($model,'idcliente'); ?>
	</div>
<div class="inline">
	<div class="column">
		<?php echo $form->labelEx($model,'numero_documento'); ?>
		<?php echo $form->textField($model,'numero_documento',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'numero_documento'); ?>
	</div>

        <div class="column">
		<?php echo $form->labelEx($model,'fecha_traslado',array('label'=>'Fecha de Traslado')); ?>
                <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array('model'=>$model,'attribute'=>'fecha_traslado','language'=>'es','options'=>array('showAnim'=>'fold','dateFormat'=>'yy-mm-dd',),'htmlOptions'=>array('style'=>'height:20px;','value'=>$fecha,),)); ?>
		<?php echo $form->error($model,'fecha_traslado'); ?>
                <?php echo $form->hiddenField($model,'fecha_registro',array('value'=>$fecha));?>
	</div>
    </div>
<div class="clear"> </div>
<br>

<?php
$url=Yii::app()->request->baseUrl;
echo CHtml::button('Agregar Producto', array(
        'name'=>'Agregar Producto',
        'onclick'=>"window.open ('?r=selectproductos/GrabarProductosguiaremisionventa', 'nom_interne_de_la_fenetre', config='height=400, width=750, toolbar=no, menubar=no, scrollbars=yes, resizable=no, location=no, directories=no, status=no')"
));

 ?>

<script type="text/javascript">
function refreshList()
{
$.fn.yiiGridView.update("pguia-venta-grid");
}
var interval = setInterval("refreshList()", 6000);
</script>
<p class="note">Porfavor espere los productos estan cargando...</p>

<?php $this->renderPartial('/pguiaventa/admin',array(
	'model'=>$pguiaventa,
)); ?>

<br>

        <div class="row">
		<?php echo $form->hiddenField($model,'usuario',array('value'=>Yii::app()->user->name));?>
                <?php echo $form->hiddenField($model,'almacen',array('value'=>MyModel::getIdAlmacen()));?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->