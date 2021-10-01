<?php
$this->breadcrumbs=array(
	'Producto Proveedors'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'Lista de  Producto-Proveedor', 'url'=>array('index')),
	array('label'=>'Administrar Producto-Proveedor', 'url'=>array('admin')),
);
?>

<h1>Asignar Los Productos a sus Proveedores</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>