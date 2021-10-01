<?php
$this->breadcrumbs=array(
	'Save Us Abs'=>array('index'),
	$model->idplana=>array('view','id'=>$model->idplana),
	'Update',
);

$this->menu=array(
	array('label'=>'List SaveUsAb', 'url'=>array('index')),
	array('label'=>'Create SaveUsAb', 'url'=>array('create')),
	array('label'=>'View SaveUsAb', 'url'=>array('view', 'id'=>$model->idplana)),
	array('label'=>'Manage SaveUsAb', 'url'=>array('admin')),
);
?>

<h1>Update SaveUsAb <?php echo $model->idplana; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>