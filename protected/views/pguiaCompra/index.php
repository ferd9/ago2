<?php
$this->breadcrumbs=array(
	'Pguia Compras',
);

$this->menu=array(
	array('label'=>'Create PguiaCompra', 'url'=>array('create')),
	array('label'=>'Manage PguiaCompra', 'url'=>array('admin')),
);
?>

<h1>Pguia Compras</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
