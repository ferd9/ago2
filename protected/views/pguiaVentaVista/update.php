<?php
$this->breadcrumbs=array(
	'Pguia Venta Vistas'=>array('index'),
	$model->idplana=>array('view','id'=>$model->idplana),
	'Update',
);

$this->menu=array(
	array('label'=>'List PguiaVentaVista', 'url'=>array('index')),
	array('label'=>'Create PguiaVentaVista', 'url'=>array('create')),
	array('label'=>'View PguiaVentaVista', 'url'=>array('view', 'id'=>$model->idplana)),
	array('label'=>'Manage PguiaVentaVista', 'url'=>array('admin')),
);
?>

<h1>Update PguiaVentaVista <?php echo $model->idplana; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>