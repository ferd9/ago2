<?php
$this->breadcrumbs=array(
	'Lista de Servicios',
);

$this->menu=array(
	array('label'=>'Crear Servicio', 'url'=>array('create')),
	array('label'=>'Administrar Servicios', 'url'=>array('admin')),
);
?>

<h1>Lista de Servicios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
