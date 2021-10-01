<?php
$this->breadcrumbs=array(
	'Lista de Movimiento de Caja'=>array('index'),
	'Vista de Movimiento Caja || '.$model->fecha_caja=>array('view','id'=>$model->idcaja),
	'Update',
);

$this->menu=array(
	array('label'=>'Lista de Caja', 'url'=>array('index')),
	array('label'=>'Asignar Monto a Caja', 'url'=>array('create')),
	array('label'=>'Vista Caja', 'url'=>array('view', 'id'=>$model->idcaja)),
	array('label'=>'Administrar Caja', 'url'=>array('admin')),
);
?>

<h1>Actualizar Caja <?php echo $model->idcaja; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>