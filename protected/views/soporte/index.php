<?php
$this->breadcrumbs=array(
	'Lista',
);

$this->menu=array(
	array('label'=>'Atencion a Ingresar', 'url'=>array('create')),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>

<h1>Lista</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
