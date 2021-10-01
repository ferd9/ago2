<?php
$this->breadcrumbs=array(
	'Pguia Compras'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PguiaCompra', 'url'=>array('index')),
	array('label'=>'Manage PguiaCompra', 'url'=>array('admin')),
);
?>

<h1>Create PguiaCompra</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>