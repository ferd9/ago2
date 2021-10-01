<?php
$this->breadcrumbs=array(
	'Precio Compra Tmps'=>array('index'),
	$model->usuario=>array('view','id'=>$model->usuario),
	'Update',
);

$this->menu=array(
	array('label'=>'List PrecioCompraTmp', 'url'=>array('index')),
	array('label'=>'Create PrecioCompraTmp', 'url'=>array('create')),
	array('label'=>'View PrecioCompraTmp', 'url'=>array('view', 'id'=>$model->usuario)),
	array('label'=>'Manage PrecioCompraTmp', 'url'=>array('admin')),
);
?>

<h1>Update PrecioCompraTmp <?php echo $model->usuario; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>