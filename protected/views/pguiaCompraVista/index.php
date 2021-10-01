<?php
$this->breadcrumbs=array(
	'Pguia Compra Vistas',
);

$this->menu=array(
	array('label'=>'Create PguiaCompraVista', 'url'=>array('create')),
	array('label'=>'Manage PguiaCompraVista', 'url'=>array('admin')),
);
?>

<h1>Pguia Compra Vistas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
