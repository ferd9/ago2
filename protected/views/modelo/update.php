<?php
$this->breadcrumbs=array(
	'Modelos'=>array('index'),
	$model->idmodelo=>array('view','id'=>$model->idmodelo),
	'Update',
);

$this->menu=array(
	array('label'=>'List Modelo', 'url'=>array('index')),
	array('label'=>'Create Modelo', 'url'=>array('create')),
	array('label'=>'View Modelo', 'url'=>array('view', 'id'=>$model->idmodelo)),
	array('label'=>'Manage Modelo', 'url'=>array('admin')),
);
?>

<h1>Update Modelo <?php echo $model->idmodelo; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>