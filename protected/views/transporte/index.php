<?php
$this->breadcrumbs=array(
	'Lista de Transportes',
);

$this->menu=array(
	array('label'=>'Crear Transporte', 'url'=>array('create')),
	array('label'=>'Administrar Transporte', 'url'=>array('admin')),
);
?>

<h1>Lista de Transportes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
