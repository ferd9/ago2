<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'guia-remision-compra-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Todos los campos <span class="required">*</span>son requeridos.</p>
        <br>
	<?php echo $form->errorSummary($model); ?>

<?php
$fecha=date('Y-m-d');
$hora=date('h:i:s');
?>

	<div class="row">
		<?php echo $form->labelEx($model,'transporte'); ?>
                <?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array('model'=>$model,'attribute'=>'transporte','source'=>  Transporte::getListTransporte(),'options'=>array('minLength'=>'2',),'htmlOptions'=>array( 'style'=>'height:20px;','size'=>'80px'),)); ?>
		<?php echo $form->error($model,'transporte'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'idproveedor', array('label'=>'Proveedor')); ?>
                <?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array('model'=>$model,'attribute'=>'idproveedor','source'=>Proveedor::getListProveedor(),'options'=>array('minLength'=>'2',),'htmlOptions'=>array( 'style'=>'height:20px;','size'=>'80px'),)); ?>
		<?php echo $form->error($model,'idproveedor'); ?>
	</div>

        <br>
<div class="inline">
	<div class="column">
		<?php echo $form->labelEx($model,'numero_documento',array('label'=>'N° Documento')); ?>
		<?php echo $form->textField($model,'numero_documento',array('size'=>23,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'numero_documento'); ?>
	</div>

        <div class="column">
		<?php echo $form->labelEx($model,'numero_orden_compra',array('label'=>'N° Orden Compra')); ?>
		<?php echo $form->textField($model,'numero_orden_compra',array('size'=>23,'maxlength'=>11)); ?>
		<?php echo $form->error($model,'numero_orden_compra'); ?>
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

        <div class="row">
		<?php echo $form->labelEx($model,'flete',array('label'=>'Costo Minimo')); ?>
		<?php echo $form->textField($model,'flete',array('size'=>23,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'flete'); ?>
	</div>               		

	<div class="row">                
                <?php echo $form->hiddenField($model,'usuario',array('value'=>Yii::app()->user->name));?>
                <?php echo $form->hiddenField($model,'almacen',array('value'=>MyModel::getIdAlmacen()));?>
	</div>
        <br>

        <?php
$url=Yii::app()->request->baseUrl;
echo CHtml::button('Agregar Producto', array(
        'name'=>'Agregar Producto',
        'onclick'=>"window.open ('?r=selectproductos/GrabarProductosguiaremisioncompra', 'nom_interne_de_la_fenetre', config='height=400, width=750, toolbar=no, menubar=no, scrollbars=yes, resizable=no, location=no, directories=no, status=no')"
));

 ?>

<script type="text/javascript">
function refreshList()
{
$.fn.yiiGridView.update("pguia-compra-grid");
}
var interval = setInterval("refreshList()", 6000);
</script>
<p class="note">Porfavor espere los productos estan cargando...</p>

<?php $this->renderPartial('/pguiacompra/admin',array(
	'model'=>$pguiacompra,
)); ?>

<br>


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->