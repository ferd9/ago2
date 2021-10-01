<?php
$this->breadcrumbs=array(
	'Lista de Empresa',
);

$this->menu=array(
	array('label'=>'Crear Empresa', 'url'=>array('create')),
	array('label'=>'Administrar Empresas', 'url'=>array('admin')),
);
?>

<h1>Lista de Empresa</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
