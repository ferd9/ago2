<?php
$this->breadcrumbs=array(
	'Pcompra Vistas'=>array('index'),
	$model->idplana=>array('view','id'=>$model->idplana),
	'Update',
);

$this->menu=array(
	array('label'=>'List PcompraVista', 'url'=>array('index')),
	array('label'=>'Create PcompraVista', 'url'=>array('create')),
	array('label'=>'View PcompraVista', 'url'=>array('view', 'id'=>$model->idplana)),
	array('label'=>'Manage PcompraVista', 'url'=>array('admin')),
);
?>

<h1>Update PcompraVista <?php echo $model->idplana; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>