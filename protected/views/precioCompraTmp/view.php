<?php
$this->breadcrumbs=array(
	'Precio Compra Tmps'=>array('index'),
	$model->usuario,
);

$this->menu=array(
	array('label'=>'List PrecioCompraTmp', 'url'=>array('index')),
	array('label'=>'Create PrecioCompraTmp', 'url'=>array('create')),
	array('label'=>'Update PrecioCompraTmp', 'url'=>array('update', 'id'=>$model->usuario)),
	array('label'=>'Delete PrecioCompraTmp', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->usuario),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PrecioCompraTmp', 'url'=>array('admin')),
);
?>

<h1>View PrecioCompraTmp #<?php echo $model->usuario; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'sutbotal',
		'igv',
		'total',
		'usuario',
		'descuento',
	),
)); ?>
