<?php
$this->breadcrumbs=array(
	'Pguia Venta Vistas',
);

$this->menu=array(
	array('label'=>'Create PguiaVentaVista', 'url'=>array('create')),
	array('label'=>'Manage PguiaVentaVista', 'url'=>array('admin')),
);
?>

<h1>Pguia Venta Vistas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
