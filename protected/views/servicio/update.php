<?php
$this->breadcrumbs=array(
	'Lista de Servicios'=>array('index'),
	'Vista del Servicio: '.$model->idservicio=>array('view','id'=>$model->idservicio),
	'Actualizar Servicio: '.$model->idservicio,
);

$this->menu=array(
	array('label'=>'Lista de Servicios', 'url'=>array('index')),
	array('label'=>'Crear Servicio', 'url'=>array('create')),
	array('label'=>'Ver Servicio', 'url'=>array('view', 'id'=>$model->idservicio)),
	array('label'=>'Administrar Servicios', 'url'=>array('admin')),
);
?>

<h1>Actualizar Servicio:</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>