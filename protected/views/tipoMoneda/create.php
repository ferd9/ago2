<?php
$this->breadcrumbs=array(
	'Lista de Monedas'=>array('index'),
	'Crear Moneda',
);

$this->menu=array(
	array('label'=>'Lista de Monedas', 'url'=>array('index')),
	array('label'=>'Administrar Monedas', 'url'=>array('admin')),
);
?>

<h1>Crear Moneda</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>