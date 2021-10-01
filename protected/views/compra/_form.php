<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'compra-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los Campos <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

<?php
$fecha=date('Y-m-d');
$hora=date('h:i:s');
?>

	<div class="row">
		<?php echo $form->labelEx($model,'idproveedor', array('label'=>'Proveedor')); ?>		
                <?php $this->widget('zii.widgets.jui.CJuiAutoComplete', array('model'=>$model,'attribute'=>'idproveedor','source'=>Proveedor::getListProveedor(),'options'=>array('minLength'=>'2',),'htmlOptions'=>array( 'style'=>'height:20px;','size'=>'94px'),)); ?>
		<?php echo $form->error($model,'idproveedor'); ?>
	</div>

        <br>
<div class="inline">
        <div class="column">
               <?php echo $form->labelEx($model,'idtipo_pago',array('label'=>'Tipo Pago')); ?>
                <?php echo $form->dropDownList($model,'idtipo_pago', TipoPago::getTipoPagos()); ?>
		<?php echo $form->error($model,'idtipo_pago'); ?>
	</div>
    
        <div class="column">
                <?php /* echo $form->labelEx($model,'idtipo_documento',array('label'=>'Tipo Documento')); ?>
                <?php echo $form->dropDownList($model,'idtipo_documento', TipoDocumento::getTipoDocumentocompra()); ?>
		<?php echo $form->error($model,'idtipo_documento'); */?>
             <?php echo $form->hiddenField($model,'idtipo_documento',array('value'=>$item));?>
	</div>

	<div class="column">
		<?php echo $form->labelEx($model,'numero_documento'); ?>
		<?php echo $form->textField($model,'numero_documento',array('size'=>25,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'numero_documento'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'fecha_compra'); ?>
                <?php $this->widget('zii.widgets.jui.CJuiDatePicker', array('model'=>$model,'attribute'=>'fecha_compra','language'=>'es','options'=>array('showAnim'=>'fold','dateFormat'=>'yy-mm-dd',),'htmlOptions'=>array('style'=>'height:20px;','value'=>$fecha,),)); ?>
		<?php echo $form->error($model,'fecha_compra'); ?>
                <?php echo $form->hiddenField($model,'fecha_registro',array('value'=>$fecha));?>
	</div>
</div>
<div class="clear"> </div>
        <br>		

<div class="inline">
        <div class="column">
		<?php echo $form->labelEx($model,'estado_pago'); ?>
		<?php echo $form->dropDownList($model,'estado_pago',array('0'=>'Seleccionar','C'=>'Cancelado','P'=>'Pendiente')); ?>
		<?php echo $form->error($model,'estado_pago'); ?>
	</div>

        <div class="row">
		<?php echo $form->labelEx($model,'observacion',array('label'=>'Observaciones')); ?>
		<?php echo $form->textField($model,'observacion',array('size'=>76,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'observacion'); ?>
	</div>
</div>
<div class="clear"> </div>
        <br>

  <?php
$url=Yii::app()->request->baseUrl;
echo CHtml::button('Agregar Nuevo Producto', array(
        'name'=>'Agregar Nuevo Producto',
        'onclick'=>"window.open ('?r=selectproductos/GrabarProductoscompra', 'nom_interne_de_la_fenetre', config='height=400, width=750, toolbar=no, menubar=no, scrollbars=yes, resizable=no, location=no, directories=no, status=no')"
));

 ?>

<script type="text/javascript">
function refreshList()
{
$.fn.yiiGridView.update("pcompra-grid");
}
var interval = setInterval("refreshList()", 6000);
</script>
<p class="note">Porfavor espere los productos estan cargando...</p>

<?php $this->renderPartial('/pcompra/admin',array(
	'model'=>$tmpcompra,
)); ?>


<?php /* $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pcompra-grid',
	'dataProvider'=>$pcompra->search(),
	'columns'=>array(
                array(
                'name'=>'cantidad',
                'header'=>'Cantidad',
                'value'=>'$data->cantidad'),
                array(
                'name'=>'nomproducto',
                'header'=>'Producto',
                'value'=>'$data->nomproducto'),
                array(
                'name'=>'moneda',
                'header'=>'Moneda',
                'value'=>'$data->moneda'),
                array(
                'name'=>'precio',
                'header'=>'Precio',
                'value'=>'$data->precio'),
                array(
                'name'=>'tipo_adquisicion',
                'header'=>'Tipo Adquisicion',
                'value'=>'$data->tipo_adquisicion'),

		array(
			'class'=>'CButtonColumn',
                        'header'=>'Quitar',
                        'deleteButtonUrl' => 'Yii::app()->createUrl("pcompra/delete",array("id"=>$data["idplana"]))',
                        'template'=>'{delete}',

		)
	),
)); */?>

<br><br>

<div class="inline">
        <div class="column">
                <?php echo $form->labelEx($model,'sub_total',array('label'=>'SubTotal')); ?>
		<?php echo $form->textField($model,'sub_total',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'sub_total'); ?>
	</div>

        <div class="column">
                <?php echo $form->labelEx($model,'igv',array('label'=>'IGV')); ?>
		<?php echo $form->textField($model,'igv',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'igv'); ?>
	</div>
	
        <div class="column">
                <?php echo $form->labelEx($model,'total',array('label'=>'Total')); ?>
		<?php echo $form->textField($model,'total',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'total'); ?>
	</div>
</div>
<div class="clear"> </div>
<br>


	<div class="row">
		<?php /* echo $form->labelEx($model,'estado'); */?>
		<?php echo $form->hiddenField($model,'estado',array('size'=>1,'maxlength'=>1)); ?>
		<?php /*echo $form->error($model,'estado');*/ ?>
	</div>

	<div class="row">
		<?php /* echo $form->labelEx($model,'usuario'); */?>
		<?php echo $form->hiddenField($model,'usuario',array('size'=>15,'maxlength'=>15,'value'=>Yii::app()->user->name)); ?>
		<?php /*echo $form->error($model,'usuario');*/ ?>
	</div>

<?php /*
	<div class="row">
		<?php echo $form->labelEx($model,'descuento_total'); ?>
		<?php echo $form->textField($model,'descuento_total',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'descuento_total'); ?>
	</div>
*/?>
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Crear'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->