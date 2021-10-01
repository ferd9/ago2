<?php
$this->breadcrumbs=array(
	'Pguia Ventas'=>array('index'),
	$model->idplana=>array('view','id'=>$model->idplana),
	'Update',
);

$this->menu=array(
	array('label'=>'List PguiaVenta', 'url'=>array('index')),
	array('label'=>'Create PguiaVenta', 'url'=>array('create')),
	array('label'=>'View PguiaVenta', 'url'=>array('view', 'id'=>$model->idplana)),
	array('label'=>'Manage PguiaVenta', 'url'=>array('admin')),
);
?>

<h1>Update PguiaVenta <?php echo $model->idplana; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>