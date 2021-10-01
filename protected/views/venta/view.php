<?php
$this->breadcrumbs=array(
	'Lista de Ventas'=>array('index'),
	'Nº Documento Venta: '.$model->numero_documento,
);

$this->menu=array(
	array('label'=>'Lista de Ventas', 'url'=>array('index')),
	//array('label'=>'Crear una Venta', 'url'=>array('create')),
	//array('label'=>'Update Venta', 'url'=>array('update', 'id'=>$model->idventa)),
	//array('label'=>'Delete Venta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idventa),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Ventas', 'url'=>array('admin')),
);                
?>


<h1>Nº Documento Venta: <?php echo $model->numero_documento; ?></h1>
<?php
$estado_venta="";
switch($model->estado_venta)
                {
                case 'C':
                $estado_venta='Cancelado';
                break;
                case 'P':
                $estado_venta= 'Pendiente';
                break;
                default :
                    $estado_venta= "";
                }
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
                array('label'=>'Cliente','value'=>$model->idcliente0->cliente0->nombre),
		array('label'=>'Tipo Documento','value'=>$model->idtipoDocumento0->descripcion),
		array('label'=>'Tipo Pago','value'=>$model->idtipoPago0->descripcion),
                array('label'=>'Fecha de Venta','value'=>$model->fecha_venta),
                array('label'=>'SubTotal','value'=>$model->subtotal),
                array('label'=>'IGV','value'=>$model->igv),
		array('label'=>'Total','value'=>$model->importe_total),
                array('label'=>'Descuento','value'=>$model->descuento),
		array('label'=>'Estado Venta','value'=>$estado_venta),
                array('label'=>'Detalle Estado Venta','value'=>$model->estado_venta_pago),
		//'usuario',
		//'almacen',
	),
)); ?>


<?php /*$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'save-us-ab-grid',
	'dataProvider'=>$modelabc->search(),
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
	),
)); */?>



<?php $this->renderPartial('/saveUsAb/admin',array(
	'model'=>$modelabc,
)); ?>




  <?php /*
$url=Yii::app()->request->baseUrl;
echo CHtml::button('Ver Productos de esta Venta', array(
        'name'=>'Ver Productos de esta Venta',
        'onclick'=>"window.open ('?r=saveUsAb/admin', 'nom_interne_de_la_fenetre', config='height=400, width=800, toolbar=no, menubar=no, scrollbars=yes, resizable=no, location=no, directories=no, status=no')"
));
*/
 ?>




<?php
/*
$connection=  Yii::app()->db;
$sqlStatement="CALL limpiartablasaveus();";
$command=$connection->createCommand($sqlStatement);
$command->execute();*/
?>