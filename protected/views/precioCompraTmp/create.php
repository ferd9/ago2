<?php
$this->breadcrumbs=array(
	'Precio Compra Tmps'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PrecioCompraTmp', 'url'=>array('index')),
	array('label'=>'Manage PrecioCompraTmp', 'url'=>array('admin')),
);
?>

<h1>Create PrecioCompraTmp</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>