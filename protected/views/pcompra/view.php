<?php
$this->breadcrumbs=array(
	'Pcompras'=>array('index'),
	$model->idplana,
);

$this->menu=array(
	array('label'=>'List Pcompra', 'url'=>array('index')),
	array('label'=>'Create Pcompra', 'url'=>array('create')),
	array('label'=>'Update Pcompra', 'url'=>array('update', 'id'=>$model->idplana)),
	array('label'=>'Delete Pcompra', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idplana),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Pcompra', 'url'=>array('admin')),
);
?>

<h1>View Pcompra #<?php echo $model->idplana; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idplana',
		'idproducto',
		'nomproducto',
		'precio',
		'idmoneda',
		'moneda',
		'nro_serie',
		'codigo_barras',
		'idtipo_adquisicion',
		'tipo_adquisicion',
		'cambio',
		'garantia',
		'descripcion',
		'cantidad',
		'almacen',
		'usuario',
		'accion_save',
	),
)); ?>
