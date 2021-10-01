<?php
$this->breadcrumbs=array(
	'Lista Guia Remision Ventas'=>array('index'),
	'Vista Guia Remision Venta # '.$model->numero_documento,
);

$this->menu=array(
	array('label'=>'Lista Guia Remision Venta', 'url'=>array('index')),
	array('label'=>'Crear Guia Remision Venta', 'url'=>array('create')),
	//array('label'=>'Update GuiaRemisionVenta', 'url'=>array('update', 'id'=>$model->idguia_remision_venta)),
	//array('label'=>'Delete GuiaRemisionVenta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idguia_remision_venta),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Guia Remision Venta', 'url'=>array('admin')),
);
?>

<h1>Vista Guia Remision Venta #<?php echo $model->numero_documento; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
                array('label'=>'Transporte','value'=>$model->idtransporte0->razon_social),
                array('label'=>'Cliente','value'=>$model->idcliente0->cliente0->nombrecompleto),		
		'direccion_destino',
		'fecha_traslado',
                'direccion_origen',
	),
)); ?>

<?php $this->renderPartial('/pguiaventaVista/admin',array(
	'model'=>$pguiaventavista,
)); ?>