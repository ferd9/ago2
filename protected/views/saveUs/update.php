<?php
$this->breadcrumbs=array(
	'Save Uses'=>array('index'),
	$model->idplana=>array('view','id'=>$model->idplana),
	'Update',
);

$this->menu=array(
	array('label'=>'List SaveUs', 'url'=>array('index')),
	array('label'=>'Create SaveUs', 'url'=>array('create')),
	array('label'=>'View SaveUs', 'url'=>array('view', 'id'=>$model->idplana)),
	array('label'=>'Manage SaveUs', 'url'=>array('admin')),
);
?>

<h1>Update SaveUs <?php echo $model->idplana; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>