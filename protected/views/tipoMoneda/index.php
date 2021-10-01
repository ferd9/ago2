<?php
$this->breadcrumbs=array(
	'Lista de Monedas',
);

$this->menu=array(
	array('label'=>'Crear Moneda', 'url'=>array('create')),
	array('label'=>'Administrar Moneda', 'url'=>array('admin')),
);
?>

<h1>Lista de Monedas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
