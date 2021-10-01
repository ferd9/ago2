<?php
$this->breadcrumbs=array(
	'Accesorios Soportes'=>array('index'),
	$model->idacce_soporte,
);

$this->menu=array(
	array('label'=>'List AccesoriosSoporte', 'url'=>array('index')),
	array('label'=>'Create AccesoriosSoporte', 'url'=>array('create')),
	array('label'=>'Update AccesoriosSoporte', 'url'=>array('update', 'id'=>$model->idacce_soporte)),
	array('label'=>'Delete AccesoriosSoporte', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idacce_soporte),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage AccesoriosSoporte', 'url'=>array('admin')),
);
?>

<h1>View AccesoriosSoporte #<?php echo $model->idacce_soporte; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idacce_soporte',
		'cantidad_soporte',
		'descripcion_soporte',
		'serie_soporte',
		'codigobarras_soporte',
		'usuario_sopore',
	),
)); ?>
