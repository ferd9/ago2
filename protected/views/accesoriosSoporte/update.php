<?php
$this->breadcrumbs=array(
	'Accesorios Soportes'=>array('index'),
	$model->idacce_soporte=>array('view','id'=>$model->idacce_soporte),
	'Update',
);

$this->menu=array(
	array('label'=>'List AccesoriosSoporte', 'url'=>array('index')),
	array('label'=>'Create AccesoriosSoporte', 'url'=>array('create')),
	array('label'=>'View AccesoriosSoporte', 'url'=>array('view', 'id'=>$model->idacce_soporte)),
	array('label'=>'Manage AccesoriosSoporte', 'url'=>array('admin')),
);
?>

<h1>Update AccesoriosSoporte <?php echo $model->idacce_soporte; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>