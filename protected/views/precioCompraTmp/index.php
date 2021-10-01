<?php
$this->breadcrumbs=array(
	'Precio Compra Tmps',
);

$this->menu=array(
	array('label'=>'Create PrecioCompraTmp', 'url'=>array('create')),
	array('label'=>'Manage PrecioCompraTmp', 'url'=>array('admin')),
);
?>

<h1>Precio Compra Tmps</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
