<?php
$this->breadcrumbs=array(
	'Precio Venta Tmps'=>array('index'),
	$model->usuario=>array('view','id'=>$model->usuario),
	'Update',
);

$this->menu=array(
	array('label'=>'List PrecioVentaTmp', 'url'=>array('index')),
	array('label'=>'Create PrecioVentaTmp', 'url'=>array('create')),
	array('label'=>'View PrecioVentaTmp', 'url'=>array('view', 'id'=>$model->usuario)),
	array('label'=>'Manage PrecioVentaTmp', 'url'=>array('admin')),
);
?>

<h1>Update PrecioVentaTmp <?php echo $model->usuario; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>