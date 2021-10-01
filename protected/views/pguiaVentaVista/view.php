<?php
$this->breadcrumbs=array(
	'Pguia Venta Vistas'=>array('index'),
	$model->idplana,
);

$this->menu=array(
	array('label'=>'List PguiaVentaVista', 'url'=>array('index')),
	array('label'=>'Create PguiaVentaVista', 'url'=>array('create')),
	array('label'=>'Update PguiaVentaVista', 'url'=>array('update', 'id'=>$model->idplana)),
	array('label'=>'Delete PguiaVentaVista', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idplana),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PguiaVentaVista', 'url'=>array('admin')),
);
?>

<h1>View PguiaVentaVista #<?php echo $model->idplana; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idplana',
		'idproducto',
		'nomproducto',
		'cantidad',
		'garantia',
		'nro_serie',
		'codigo_barras',
		'descripcion',
		'almacen',
		'usuario',
	),
)); ?>
