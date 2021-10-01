<?php
$this->breadcrumbs=array(
	'Precio Venta Tmps'=>array('index'),
	$model->usuario,
);

$this->menu=array(
	array('label'=>'List PrecioVentaTmp', 'url'=>array('index')),
	array('label'=>'Create PrecioVentaTmp', 'url'=>array('create')),
	array('label'=>'Update PrecioVentaTmp', 'url'=>array('update', 'id'=>$model->usuario)),
	array('label'=>'Delete PrecioVentaTmp', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->usuario),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage PrecioVentaTmp', 'url'=>array('admin')),
);
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'sutbotal',
		'igv',
		'total',
	),
)); ?>
