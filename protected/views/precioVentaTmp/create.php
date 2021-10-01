<?php
$this->breadcrumbs=array(
	'Precio Venta Tmps'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List PrecioVentaTmp', 'url'=>array('index')),
	array('label'=>'Manage PrecioVentaTmp', 'url'=>array('admin')),
);
?>

<h1>Aplicar Descuento</h1>


<?php echo $this->renderPartial('_form', array('model'=>$model,'mensaje'=>$mensaje)); ?>