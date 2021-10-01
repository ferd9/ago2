<?php
$this->breadcrumbs=array(
	'Ventas'=>array('index'),
	$model->idventa=>array('view','id'=>$model->idventa),
	'Update',
);

$this->menu=array(
	array('label'=>'List Venta', 'url'=>array('index')),
	array('label'=>'Create Venta', 'url'=>array('create')),
	array('label'=>'View Venta', 'url'=>array('view', 'id'=>$model->idventa)),
	array('label'=>'Manage Venta', 'url'=>array('admin')),
);
?>

<h1>Update Venta <?php echo $model->idventa; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>