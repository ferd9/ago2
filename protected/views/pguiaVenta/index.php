<?php
$this->breadcrumbs=array(
	'Pguia Ventas',
);

$this->menu=array(
	array('label'=>'Create PguiaVenta', 'url'=>array('create')),
	array('label'=>'Manage PguiaVenta', 'url'=>array('admin')),
);
?>

<h1>Pguia Ventas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
