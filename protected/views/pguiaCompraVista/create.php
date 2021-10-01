<?php
$this->breadcrumbs=array(
	'Pguia Compra Vistas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PguiaCompraVista', 'url'=>array('index')),
	array('label'=>'Manage PguiaCompraVista', 'url'=>array('admin')),
);
?>

<h1>Create PguiaCompraVista</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>