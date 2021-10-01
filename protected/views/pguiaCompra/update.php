<?php
$this->breadcrumbs=array(
	'Pguia Compras'=>array('index'),
	$model->idplana=>array('view','id'=>$model->idplana),
	'Update',
);

$this->menu=array(
	array('label'=>'List PguiaCompra', 'url'=>array('index')),
	array('label'=>'Create PguiaCompra', 'url'=>array('create')),
	array('label'=>'View PguiaCompra', 'url'=>array('view', 'id'=>$model->idplana)),
	array('label'=>'Manage PguiaCompra', 'url'=>array('admin')),
);
?>

<h1>Update PguiaCompra <?php echo $model->idplana; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>