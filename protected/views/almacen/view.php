<?php
$this->breadcrumbs=array(
	'Lista de Almacenes'=>array('index'),
	'Vista del Almacen #'.$model->idalmacen.'',
);

$this->menu=array(
	array('label'=>'Lista de Almacenes', 'url'=>array('index')),
	array('label'=>'Crear Almacen', 'url'=>array('create')),
	array('label'=>'Actualizar Almacen', 'url'=>array('update', 'id'=>$model->idalmacen)),
	array('label'=>'Borrar Almacen', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idalmacen),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Almacenes', 'url'=>array('admin')),
);
?>

<h1>Vista del Almacen #<?php echo $model->idalmacen; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'idalmacen',
		array('name'=>'idempresa','value'=>$model->idempresa0->ruc),
		'nombre',
		'direccion',
		'telefono',
		'fax',
		'anexo',
		//'estado',
	),
)); ?>
