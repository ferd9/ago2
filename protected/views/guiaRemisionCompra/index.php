<?php
$this->breadcrumbs=array(
	'Lista de Guia Remision Compra',
);

$this->menu=array(
	array('label'=>'Crear Guia Remision Compra', 'url'=>array('create')),
	array('label'=>'Administrar Guia Remision Compra', 'url'=>array('admin')),
);
?>

<h1>Lista de Guia Remision Compra</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
