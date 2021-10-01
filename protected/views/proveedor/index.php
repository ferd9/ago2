<?php
$this->breadcrumbs=array(
	'Lista de Proveedores',
);

$this->menu=array(
	array('label'=>'Crear Proveedor', 'url'=>array('create')),
	array('label'=>'Administracion de Proveedores', 'url'=>array('admin')),
);
?>

<h1>Lista de Proveedores</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
