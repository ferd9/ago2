<?php
$this->breadcrumbs=array(
	'Save Uses'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SaveUs', 'url'=>array('index')),
	array('label'=>'Manage SaveUs', 'url'=>array('admin')),
);
?>

<h1>Create SaveUs</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>