<?php
$this->breadcrumbs=array(
	'Lista de Clientes',
);

$this->menu=array(
	array('label'=>'Crear Cliente', 'url'=>array('create')),
	array('label'=>'Administracion de Clientes', 'url'=>array('admin')),
);
?>

<h1>Lista de Clientes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>

