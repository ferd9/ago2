<?php
$this->breadcrumbs=array(
	'Igvs'=>array('index'),
	'Create',
);

$this->menu=array(
	//array('label'=>'List Igv', 'url'=>array('index')),
	//array('label'=>'Manage Igv', 'url'=>array('admin')),
);
?>

<h1>Crear Igv</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>