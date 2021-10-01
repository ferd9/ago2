<?php
$this->breadcrumbs=array(
	'Lista Guia Remision Ventas'=>array('index'),
	'Crear Guia Remision Venta',
);

$this->menu=array(
	array('label'=>'Lista de Guia Remision Venta', 'url'=>array('index')),
	array('label'=>'Administrar Guia Remision Venta', 'url'=>array('admin')),
);
?>

<h1>Crear Guia Remision Venta</h1>

<?php echo $this->renderPartial('_form', array('pguiaventa'=>$pguiaventa,'model'=>$model)); ?>