<?php
$this->breadcrumbs=array(
	'Lista de Proveedores'=>array('index'),
	'Crear Proveedor',
);

$this->menu=array(
	array('label'=>'Lista de Proveedores', 'url'=>array('index')),
	array('label'=>'Administrar Proveedores', 'url'=>array('admin')),
);
?>

<h1>Crear Proveedor</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'persona'=>$persona,'ubigeo'=>$ubigeo)); ?>