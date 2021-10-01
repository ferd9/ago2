<?php
$this->breadcrumbs=array(
	'Pcompra Vistas'=>array('index'),
	$model->idplana,
);

$this->menu=array(
	array('label'=>'List PcompraVista', 'url'=>array('index')),
	array('label'=>'Create PcompraVista', 'url'=>array('create')),
	array('label'=>'Update PcompraVista', 'url'=>array('update', 'id'=>$model->idplana)),
	array('label'=>'Delete PcompraVista', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idplana),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PcompraVista', 'url'=>array('admin')),
);
?>

<h1>View PcompraVista #<?php echo $model->idplana; ?></h1>

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
