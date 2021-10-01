<?php
$this->breadcrumbs=array(
	'Pguia Compra Vistas'=>array('index'),
	$model->idplana=>array('view','id'=>$model->idplana),
	'Update',
);

$this->menu=array(
	array('label'=>'List PguiaCompraVista', 'url'=>array('index')),
	array('label'=>'Create PguiaCompraVista', 'url'=>array('create')),
	array('label'=>'View PguiaCompraVista', 'url'=>array('view', 'id'=>$model->idplana)),
	array('label'=>'Manage PguiaCompraVista', 'url'=>array('admin')),
);
?>

<h1>Update PguiaCompraVista <?php echo $model->idplana; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>