<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'venta-form',
	'enableAjaxValidation'=>false,
)); ?>


<div align="right">

<?php
if($item==1)
{
echo "<strong> Importar: </strong>";
$url=Yii::app()->request->baseUrl;
echo CHtml::button('Guia Venta', array(
        'name'=>'Guia Venta',
        'onclick'=>"location='?r=venta/viewGuia'"
));
echo " || ";
echo CHtml::button('Cotizacion', array(
        'name'=>'Cotizacion',
        'onclick'=>"location='?r=venta/viewCotizacion'"
));

echo " || ";
echo CHtml::button('Nota Venta', array(
        'name'=>'Nota Venta',
        'onclick'=>"location='?r=venta/viewNota'"
));


}

//echo $importguia;
 ?>

</div>



	<p class="note">Los Campos <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model);
        ?>

<?php
//
$fecha=date('Y-m-d');
$hora=date('h:i:s');
?>


        <div class="row">
                <?php echo $form->labelEx($model,'idcliente',array('label'=>'Nombre del Cliente')); ?>
                <?php
                if($importguia<>'')
                {
                echo $form->textField($model,'idcliente',array('size'=>80,'maxlength'=>80,'style'=>'height:20px;','readonly'=>true,'value'=>Cliente::getnomClienteGuiaVenta($importguia)));
                }
                elseif($importcotiza<>'')
                {
                echo $form->textField($model,'idcliente',array('size'=>80,'maxlength'=>80,'style'=>'height:20px;','readonly'=>true,'value'=>Cliente::getnomClienteCotizacion($importcotiza)));
                }
                elseif($importnota<>'')
                {
                echo $form->textField($model,'idcliente',array('size'=>80,'maxlength'=>80,'style'=>'height:20px;','readonly'=>true,'value'=>Cliente::getnomClienteCotizacion($importnota)));
                }
                else
                {
                $this->widget('zii.widgets.jui.CJuiAutoComplete', array('model'=>$model,'attribute'=>'idcliente','source'=>Cliente::getListClientes(),'options'=>array('minLength'=>'2',),'htmlOptions'=>array( 'style'=>'height:20px;','size'=>'80px'),));
                }
                ?>
                <?php echo $form->error($model,'idcliente'); ?>
        </div>
        <br>
<div class="inline">
        <div class="column">
                <?php /*echo $form->labelEx($model,'idtipo_documento',array('label'=>'Tipo Documento')); ?>
                <?php echo $form->dropDownList($model,'idtipo_documento', TipoDocumento::getTipoDocumento()); ?>
		<?php echo $form->error($model,'idtipo_documento'); */?>
	</div>

        <div class="column">
                <?php echo $form->hiddenField($model,'idtipo_documento', array('value'=>$item)); ?>
	</div>

        <div class="column">
		<?php echo $form->labelEx($model,'numero_documento'); ?>
		<?php 
                if($importguia<>'')
                {
                 echo $nomdoc = "Nro Guia Venta: ".GuiaRemisionVenta::getnumerodocguiaventa($importguia)."<br>";
                }
                elseif($importcotiza<>'')
                {
                echo $nomdoc = "Nro Cotizacion: ".Venta::getnumerodoccotizacion($importcotiza)."<br>";
                }
                elseif($importnota<>'')
                {
                echo $nomdoc = "Nro Nota Venta: ".Venta::getnumerodoccotizacion($importnota)."<br>";
                }
                else
                { }
                echo $form->textField($model,'numero_documento',array('size'=>40,'maxlength'=>20));
                ?>
		<?php echo $form->error($model,'numero_documento'); ?>
	</div>
        <div class="column">
               <?php echo $form->labelEx($model,'idtipo_pago',array('label'=>'Tipo Pago')); ?>
                <?php echo $form->dropDownList($model,'idtipo_pago', TipoPago::getTipoPagos()); ?>
		<?php echo $form->error($model,'idtipo_pago'); ?>
	</div>

    <div class="column">

                <?php echo $form->labelEx($model,'Fecha'); ?>
                <?php
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                         'model'=>$model,
                         'attribute'=>'fecha_venta',
                         'language'=>'es',
                        // additional javascript options for the date picker plugin
                        'options'=>array(
                            'showAnim'=>'fold',
                            'dateFormat'=>'yy-mm-dd',

                        ),
                        'htmlOptions'=>array(
                            'style'=>'height:20px;',
                            'value'=>$fecha,
                        ),
                    ));
                ?>
		<?php echo $form->error($model,'fecha_venta'); ?>

                <?php echo $form->hiddenField($model,'fecha_venta',array('value'=>date('Y-m-d')));?>
	</div>


</div>
<div class="clear"> </div>

<br>

<div class="inline">
     <div class="column">
		<?php echo $form->labelEx($model,'estado_venta',array('label'=>'Estado')); ?>
		<?php echo $form->dropDownList($model,'estado_venta',array('0'=>'Seleccionar','C'=>'Cancelado','P'=>'Pendiente')); ?>
		<?php echo $form->error($model,'estado_venta'); ?>
	</div>

	<div class="column">
		<?php echo $form->labelEx($model,'estado_venta_pago',array('label'=>'Detalle Estado')); ?>
		<?php echo $form->textField($model,'estado_venta_pago',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'estado_venta_pago'); ?>
	</div>

</div>
<div class="clear"> </div>

<div class="inline">
     <div class="column">
                <?php echo $form->hiddenField($model,'fecha_registro',array('value'=>date('Y-m-d')));?>
	</div>

	<div class="column">
		<?php /*echo $form->labelEx($model,'hora');*/ ?>
		<?php echo $form->hiddenField($model,'hora',array('value'=>$hora)); ?>
		<?php /*echo $form->error($model,'hora');*/ ?>
	</div>
</div>
<div class="clear"> </div>
<br>

<?php
$url=Yii::app()->request->baseUrl;
echo CHtml::button('Agregar Producto', array(
        'name'=>'Agregar Producto',
        'onclick'=>"window.open ('?r=selectproductos/GrabarProductos', 'b2', config='height=400, width=750, toolbar=no, menubar=no, scrollbars=yes, resizable=no, location=no, directories=no, status=no')"
));

?>

<?php/*
$url=Yii::app()->request->baseUrl;
echo CHtml::button('Agregar Servicio', array(
        'name'=>'Agregar Servicio',
        'onclick'=>"window.open ('?r=selectservicios/GrabarServicios', 'b3', config='height=400, width=750, toolbar=no, menubar=no, scrollbars=yes, resizable=no, location=no, directories=no, status=no')"
));
*/
?>

<script type="text/javascript">
function refreshList()
{
$.fn.yiiGridView.update("precio-venta-tmp-grid");
$.fn.yiiGridView.update("save-us-grid");
}
var interval = setInterval("refreshList()", 6000);
</script>
<p class="note">Porfavor espere los productos estan cargando...</p>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'save-us-grid',
	'dataProvider'=>$SaveUs->search2(),
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
                'name'=>'nro_serie',
                'header'=>'NroSerie',
                'value'=>'$data->nro_serie'),
                array(
                'name'=>'codigo_barras',
                'header'=>'CodBarra',
                'value'=>'$data->codigo_barras'),
                array(
                'name'=>'tipo_adquisicion',
                'header'=>'Tipo Adquisicion',
                'value'=>'$data->tipo_adquisicion'),
                array(
                'name'=>'tipo_ingreso',
                'header'=>'Tipo Ingreso',
                'value'=>'$data->tipo_ingreso'),
                array(
                'name'=>'garantia',
                'header'=>'Garantia',
                'value'=>'$data->garantia'),
                array(
                'name'=>'descripcion',
                'header'=>'Descripcion Servicio',
                'value'=>'$data->descripcion'),
		array(
			'class'=>'CButtonColumn',
                        'header'=>'Quitar',
                        'deleteButtonUrl' => 'Yii::app()->createUrl("saveUs/delete",array("id"=>$data["idplana"]))',
                        'template'=>'{delete}',

		)
	),
)); ?>
<br>

<?php
/*
$modela=PrecioVentaTmp::model()->findByPk((string)Yii::app()->user->name);
$this->widget('zii.widgets.CDetailView', array(
	'data'=>$modela,
        'id'=>'precioventa',
	'attributes'=>array(
		'sutbotal',
		'igv',
		'total',
	),
)); */?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'precio-venta-tmp-grid',
	'dataProvider'=>$precioVentaTmp->search(),
	'columns'=>array(
                array(
                'name'=>'sutbotal',
                'header'=>'Sub Total',
                'value'=>'$data->sutbotal'),
                array(
                'name'=>'igv',
                'header'=>'IGV',
                'value'=>'$data->igv'),
		array(
                'name'=>'total',
                'header'=>'Total',
                'value'=>'$data->total'),
                array(
                'name'=>'descuento',
                'header'=>'Descuento',
                'value'=>'$data->descuento'),
	),
)); ?>
  <?php
$url=Yii::app()->request->baseUrl;
echo CHtml::button('Aplicar Descuento', array(
        'name'=>'Aplicar Descuento',
        'onclick'=>"window.open ('?r=PrecioVentaTmp/create', 'b1', config='height=200, width=350, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no')"
));

 ?>






<br>

<?php
/*
$total = MyModel::getSuma();
$SubTotal = MyModel::getSubTotal($total);
$igv = MyModel::getIgvMonto($total);
?>

<div class="inline">
	<div class="column">
		<?php echo $form->labelEx($model,'subtotal',array('label'=>'SubTotal')); ?>
	</div>
        <div class="column">
		<?php echo $form->textField($model,'subtotal',array('size'=>9,'value'=>MyModel::getRedondear($SubTotal),'maxlength'=>9,'readonly'=>'readonly')); ?>
		<?php echo $form->error($model,'subtotal'); ?>
	</div>
</div>
<br>
<div class="clear" align="right"> </div>


<div class="inline">
	<div class="column">
		<?php echo $form->labelEx($model,'igv',array('label'=>'IGV')); ?>
	</div>
        <div class="column">
		<?php echo $form->textField($model,'igv',array('size'=>9,'maxlength'=>9,'value'=>MyModel::getRedondear($igv),'readonly'=>'readonly')); ?>
		<?php echo $form->error($model,'igv'); ?>
	</div>
</div>
<br>
<div class="clear" align="right"> </div>
<div class="inline">
	<div class="column">
		<?php echo $form->labelEx($model,'importe_total',array('label'=>'Total')); ?>
	</div>
        <div class="column">
		<?php echo $form->textField($model,'importe_total',array('size'=>9,'maxlength'=>9,'value'=>MyModel::getRedondear($total),'readonly'=>'readonly')); ?>
		<?php echo $form->error($model,'importe_total'); ?>
	</div>
</div>
 
 */?>
<br>
<div class="clear" align="right"> </div>
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

	<div class="row">
		<?php /* echo $form->labelEx($model,'almacen'); ?>
		<?php echo $form->textField($model,'almacen',array('size'=>15,'maxlength'=>15)); ?>
		<?php echo $form->error($model,'almacen'); */?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Crear' : 'Actualizar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->