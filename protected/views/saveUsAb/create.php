<?php
$this->breadcrumbs=array(
	'Save Us Abs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SaveUsAb', 'url'=>array('index')),
	array('label'=>'Manage SaveUsAb', 'url'=>array('admin')),
);
?>

<h1>Create SaveUsAb</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>