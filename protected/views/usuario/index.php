<?php
$this->breadcrumbs=array(
	'Lista de Usuarios',
);

$this->menu=array(
	array('label'=>'Crear Usuario', 'url'=>array('create')),
	array('label'=>'Administracion Usuario', 'url'=>array('admin')),
);
?>

<h1>Lista de Usuarios</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>