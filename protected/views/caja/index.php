<?php
$this->breadcrumbs=array(
	'Lista de Movimiento de Caja',
);
$fechactual=date('Y-m-d');
$this->menu=array(
	array('label'=>'Movimiento de Caja - '.$fechactual.'', 'url'=>array('create')),
	array('label'=>'Administrar Movimientos Caja', 'url'=>array('admin')),
);
?>

<h1>Lista de Movimientos Caja</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
