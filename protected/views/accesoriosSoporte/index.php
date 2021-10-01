<?php
$this->breadcrumbs=array(
	'Accesorios Soportes',
);

$this->menu=array(
	array('label'=>'Create AccesoriosSoporte', 'url'=>array('create')),
	array('label'=>'Manage AccesoriosSoporte', 'url'=>array('admin')),
);
?>

<h1>Accesorios Soportes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
