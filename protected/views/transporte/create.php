<?php
$this->breadcrumbs=array(
	'Lista de Transportes'=>array('index'),
	'Crear un Transporte',
);

$this->menu=array(
	array('label'=>'Lista de Transportes', 'url'=>array('index')),
	array('label'=>'Administrar Transporte', 'url'=>array('admin')),
);
?>

<h1>Crear un Transporte</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>