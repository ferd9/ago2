<?php
$this->breadcrumbs=array(
	'Pguia Compras'=>array('index'),
	$model->idplana,
);

$this->menu=array(
	array('label'=>'List PguiaCompra', 'url'=>array('index')),
	array('label'=>'Create PguiaCompra', 'url'=>array('create')),
	array('label'=>'Update PguiaCompra', 'url'=>array('update', 'id'=>$model->idplana)),
	array('label'=>'Delete PguiaCompra', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idplana),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PguiaCompra', 'url'=>array('admin')),
);
?>

<h1>View PguiaCompra #<?php echo $model->idplana; ?></h1>

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
