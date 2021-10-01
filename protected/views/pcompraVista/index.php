<?php
$this->breadcrumbs=array(
	'Pcompra Vistas',
);

$this->menu=array(
	array('label'=>'Create PcompraVista', 'url'=>array('create')),
	array('label'=>'Manage PcompraVista', 'url'=>array('admin')),
);
?>

<h1>Pcompra Vistas</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
