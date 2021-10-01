<?php
$this->breadcrumbs=array(
	'Pcompras'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Pcompra', 'url'=>array('index')),
	array('label'=>'Manage Pcompra', 'url'=>array('admin')),
);
?>

<h1>Create Pcompra</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>