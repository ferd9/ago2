<?php
$this->breadcrumbs=array(
	'Lista de Compras',
);

$this->menu=array(
	//array('label'=>'Crear una Compra', 'url'=>array('create')),
	array('label'=>'Administrar Compras', 'url'=>array('admin')),
);
?>

<h1>Lista de Compras</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
