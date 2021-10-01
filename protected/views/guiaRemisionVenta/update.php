<?php
$this->breadcrumbs=array(
	'Guia Remision Ventas'=>array('index'),
	$model->idguia_remision_venta=>array('view','id'=>$model->idguia_remision_venta),
	'Update',
);

$this->menu=array(
	array('label'=>'List GuiaRemisionVenta', 'url'=>array('index')),
	array('label'=>'Create GuiaRemisionVenta', 'url'=>array('create')),
	array('label'=>'View GuiaRemisionVenta', 'url'=>array('view', 'id'=>$model->idguia_remision_venta)),
	array('label'=>'Manage GuiaRemisionVenta', 'url'=>array('admin')),
);
?>

<h1>Update GuiaRemisionVenta <?php echo $model->idguia_remision_venta; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>