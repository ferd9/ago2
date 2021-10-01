<?php
$this->breadcrumbs=array(
	'Compras'=>array('index'),
	$model->idcompra=>array('view','id'=>$model->idcompra),
	'Update',
);

$this->menu=array(
	array('label'=>'List Compra', 'url'=>array('index')),
	array('label'=>'Create Compra', 'url'=>array('create')),
	array('label'=>'View Compra', 'url'=>array('view', 'id'=>$model->idcompra)),
	array('label'=>'Manage Compra', 'url'=>array('admin')),
);
?>

<h1>Update Compra <?php echo $model->idcompra; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>