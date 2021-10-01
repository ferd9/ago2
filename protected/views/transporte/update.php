<?php
$this->breadcrumbs=array(
	'Transportes'=>array('index'),
	$model->idtransporte=>array('view','id'=>$model->idtransporte),
	'Update',
);

$this->menu=array(
	array('label'=>'List Transporte', 'url'=>array('index')),
	array('label'=>'Create Transporte', 'url'=>array('create')),
	array('label'=>'View Transporte', 'url'=>array('view', 'id'=>$model->idtransporte)),
	array('label'=>'Manage Transporte', 'url'=>array('admin')),
);
?>

<h1>Update Transporte <?php echo $model->idtransporte; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>