<?php
$this->breadcrumbs=array(
	'Precio Venta Tmps',
);

$this->menu=array(
	array('label'=>'Create PrecioVentaTmp', 'url'=>array('create')),
	array('label'=>'Manage PrecioVentaTmp', 'url'=>array('admin')),
);
?>

<h1>Precio Venta Tmps</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
