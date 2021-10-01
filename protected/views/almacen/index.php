<?php
$this->breadcrumbs=array(
	'Lista de Almacenes',
);

$this->menu=array(
	array('label'=>'Crear Almacen', 'url'=>array('create')),
	array('label'=>'Administrar Almacenes', 'url'=>array('admin')),
);
?>

<h1>Lista de Almacenes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
