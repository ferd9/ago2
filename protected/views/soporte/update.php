<?php
$this->breadcrumbs=array(
	'Soportes'=>array('index'),
	$model->idsoporte=>array('view','id'=>$model->idsoporte),
	'Update',
);

$this->menu=array(
	array('label'=>'List Soporte', 'url'=>array('index')),
	array('label'=>'Create Soporte', 'url'=>array('create')),
	array('label'=>'View Soporte', 'url'=>array('view', 'id'=>$model->idsoporte)),
	array('label'=>'Manage Soporte', 'url'=>array('admin')),
);
?>

<h1>Update Soporte <?php echo $model->idsoporte; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>