<?php
$this->breadcrumbs=array(
	'Save Us Abs'=>array('index'),
	$model->idplana,
);

$this->menu=array(
	array('label'=>'List SaveUsAb', 'url'=>array('index')),
	array('label'=>'Create SaveUsAb', 'url'=>array('create')),
	array('label'=>'Update SaveUsAb', 'url'=>array('update', 'id'=>$model->idplana)),
	array('label'=>'Delete SaveUsAb', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idplana),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SaveUsAb', 'url'=>array('admin')),
);
?>

<h1>View SaveUsAb #<?php echo $model->idplana; ?></h1>

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
		'idtipo_ingreso',
		'tipo_ingreso',
		'garantia',
		'descripcion',
		'cantidad',
		'almacen',
		'usuario',
	),
)); ?>
