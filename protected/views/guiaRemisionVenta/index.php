<?php
$this->breadcrumbs=array(
	'Lista Guia Remision Ventas',
);

$this->menu=array(
	array('label'=>'Crear Guia Remision Venta', 'url'=>array('create')),
	array('label'=>'Administrar Guia Remision Venta', 'url'=>array('admin')),
);
?>

<h1>Lista Guia Remision Ventas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
