<?php
$this->breadcrumbs=array(
	'Producto Proveedors',
);

$this->menu=array(
	array('label'=>'Asignar Producto-Proveedor', 'url'=>array('create')),
	array('label'=>'Administrar Producto-Proveedor', 'url'=>array('admin')),
);
?>

<h1>Producto - Proveedor</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
