<?php
$this->breadcrumbs=array(
	'Lista de Guia Remision Compra'=>array('index'),
	$model->idguia_remision_compra=>array('view','id'=>$model->idguia_remision_compra),
	'Update',
);

$this->menu=array(
	array('label'=>'List GuiaRemisionCompra', 'url'=>array('index')),
	array('label'=>'Create GuiaRemisionCompra', 'url'=>array('create')),
	array('label'=>'View GuiaRemisionCompra', 'url'=>array('view', 'id'=>$model->idguia_remision_compra)),
	array('label'=>'Manage GuiaRemisionCompra', 'url'=>array('admin')),
);
?>

<h1>Update GuiaRemisionCompra <?php echo $model->idguia_remision_compra; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>