<?php
$this->breadcrumbs=array(
	'Pguia Venta Vistas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PguiaVentaVista', 'url'=>array('index')),
	array('label'=>'Manage PguiaVentaVista', 'url'=>array('admin')),
);
?>

<h1>Create PguiaVentaVista</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>