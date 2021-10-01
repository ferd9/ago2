<?php
$this->breadcrumbs=array(
	'Save Uses'=>array('index'),
	$model->idplana,
);

$this->menu=array(
	array('label'=>'List SaveUs', 'url'=>array('index')),
	array('label'=>'Create SaveUs', 'url'=>array('create')),
	array('label'=>'Update SaveUs', 'url'=>array('update', 'id'=>$model->idplana)),
	array('label'=>'Delete SaveUs', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idplana),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SaveUs', 'url'=>array('admin')),
);
?>

<h1>View SaveUs #<?php echo $model->idplana; ?></h1>

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
