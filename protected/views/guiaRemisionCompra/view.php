<?php
$this->breadcrumbs=array(
	'Lista de Guia Remision Compra'=>array('index'),
	'Vista Guia Remision Compra # '.$model->numero_documento,
);

$this->menu=array(
	array('label'=>'Lista Guia Remision Compra', 'url'=>array('index')),
	array('label'=>'Crear Guia Remision Compra', 'url'=>array('create')),
	//array('label'=>'Update GuiaRemisionCompra', 'url'=>array('update', 'id'=>$model->idguia_remision_compra)),
	//array('label'=>'Delete GuiaRemisionCompra', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idguia_remision_compra),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Guia Remision Compra', 'url'=>array('admin')),
);
?>

<h1>Vista Guia Remision Compra #<?php echo $model->numero_documento; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(               
		array('label'=>'Transporte','value'=>$model->transporte0->razon_social),
                'numero_orden_compra',
		'numero_documento',
                 array('label'=>'Proveedor','value'=>$model->idproveedor0->proveedor0->nombrecompleto),
		'numero_origen',
		'nombre_origen',
		'direccion_origen',
		'fecha_traslado',
                array('label'=>'Costo Minimo','value'=>$model->flete),
	),
)); ?>

<?php $this->renderPartial('/pguiacompraVista/admin',array(
	'model'=>$pguiacompravista,
)); ?>

