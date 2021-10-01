<?php
$this->breadcrumbs=array(
	'Pguia Compra Vistas'=>array('index'),
	$model->idplana,
);

$this->menu=array(
	array('label'=>'List PguiaCompraVista', 'url'=>array('index')),
	array('label'=>'Create PguiaCompraVista', 'url'=>array('create')),
	array('label'=>'Update PguiaCompraVista', 'url'=>array('update', 'id'=>$model->idplana)),
	array('label'=>'Delete PguiaCompraVista', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idplana),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PguiaCompraVista', 'url'=>array('admin')),
);
?>

<h1>View PguiaCompraVista #<?php echo $model->idplana; ?></h1>

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
