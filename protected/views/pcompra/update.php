<?php
$this->breadcrumbs=array(
	'Pcompras'=>array('index'),
	$model->idplana=>array('view','id'=>$model->idplana),
	'Update',
);

$this->menu=array(
	array('label'=>'List Pcompra', 'url'=>array('index')),
	array('label'=>'Create Pcompra', 'url'=>array('create')),
	array('label'=>'View Pcompra', 'url'=>array('view', 'id'=>$model->idplana)),
	array('label'=>'Manage Pcompra', 'url'=>array('admin')),
);
?>

<h1>Update Pcompra <?php echo $model->idplana; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>