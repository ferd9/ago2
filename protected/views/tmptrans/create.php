<?php
$this->breadcrumbs=array(
	'Tmptrans'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Tmptrans', 'url'=>array('index')),
	array('label'=>'Manage Tmptrans', 'url'=>array('admin')),
);
?>

<h1>Create Tmptrans</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>