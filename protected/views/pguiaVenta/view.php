<?php
$this->breadcrumbs=array(
	'Pguia Ventas'=>array('index'),
	$model->idplana,
);

$this->menu=array(
	array('label'=>'List PguiaVenta', 'url'=>array('index')),
	array('label'=>'Create PguiaVenta', 'url'=>array('create')),
	array('label'=>'Update PguiaVenta', 'url'=>array('update', 'id'=>$model->idplana)),
	array('label'=>'Delete PguiaVenta', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idplana),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PguiaVenta', 'url'=>array('admin')),
);
?>

<h1>View PguiaVenta #<?php echo $model->idplana; ?></h1>

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
