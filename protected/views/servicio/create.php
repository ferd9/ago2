<?php
$this->breadcrumbs=array(
	'Lista de Servicios'=>array('index'),
	'Crear Servicio',
);

$this->menu=array(
	array('label'=>'Lista de Servicios', 'url'=>array('index')),
	array('label'=>'Administrar Servicios', 'url'=>array('admin')),
);
?>

<h1>Crear Servicio</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>