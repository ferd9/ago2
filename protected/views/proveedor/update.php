<?php
$this->breadcrumbs=array(
	'Lista de Proveedores'=>array('index'),
	'Vista del Proveedor # '.$model->idproveedor=>array('view','id'=>$model->idproveedor),
	'Actualizar Proveedor # '.$model->idproveedor,
);

$this->menu=array(
	array('label'=>'Lista de Proveedores', 'url'=>array('index')),
	array('label'=>'Crear Proveedor', 'url'=>array('create')),
	array('label'=>'Ver Proveedor', 'url'=>array('view', 'id'=>$model->idproveedor)),
	array('label'=>'Administrar Proveedores', 'url'=>array('admin')),
);
?>

<h1>Actualizar Proveedor #<?php echo $model->idproveedor; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'persona'=>$persona,'ubigeo'=>$ubigeo)); ?>