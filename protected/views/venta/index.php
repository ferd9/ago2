<?php
$this->breadcrumbs=array(
	'Lista de Ventas',
);

$this->menu=array(
	//array('label'=>'Crear Factura Venta', 'url'=>array('create&t=fv')),

	array('label'=>'Administrar Ventas', 'url'=>array('admin')),
);
?>

<h1>Lista de Ventas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
