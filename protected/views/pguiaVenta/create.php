<?php
$this->breadcrumbs=array(
	'Pguia Ventas'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PguiaVenta', 'url'=>array('index')),
	array('label'=>'Manage PguiaVenta', 'url'=>array('admin')),
);
?>

<h1>Create PguiaVenta</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>