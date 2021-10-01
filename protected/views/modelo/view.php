<?php
$this->breadcrumbs=array(
	'Modelos'=>array('index'),
	$model->idmodelo,
);

$this->menu=array(
	array('label'=>'List Modelo', 'url'=>array('index')),
	array('label'=>'Create Modelo', 'url'=>array('create')),
	array('label'=>'Update Modelo', 'url'=>array('update', 'id'=>$model->idmodelo)),
	array('label'=>'Delete Modelo', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idmodelo),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Modelo', 'url'=>array('admin')),
);
?>

<h1>View Modelo #<?php echo $model->idmodelo; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idmodelo',
		'idmarca',
		'idcategoria',
		'descripcion',
	),
)); ?>
