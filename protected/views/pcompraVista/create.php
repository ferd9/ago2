<?php
$this->breadcrumbs=array(
	'Pcompra Vistas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PcompraVista', 'url'=>array('index')),
	array('label'=>'Manage PcompraVista', 'url'=>array('admin')),
);
?>

<h1>Create PcompraVista</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>