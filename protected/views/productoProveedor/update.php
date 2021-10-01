<?php
$this->breadcrumbs=array(
	'Producto Proveedors'=>array('index'),
	$model->idproducto_proveedor=>array('view','id'=>$model->idproducto_proveedor),
	'Update',
);

$this->menu=array(
	array('label'=>'List ProductoProveedor', 'url'=>array('index')),
	array('label'=>'Create ProductoProveedor', 'url'=>array('create')),
	array('label'=>'View ProductoProveedor', 'url'=>array('view', 'id'=>$model->idproducto_proveedor)),
	array('label'=>'Manage ProductoProveedor', 'url'=>array('admin')),
);
?>

<h1>Update ProductoProveedor <?php echo $model->idproducto_proveedor; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>