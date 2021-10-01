<?php
$this->breadcrumbs=array(
	'Lista de Empresa'=>array('index'),
	'Crear Empresa',
);

$this->menu=array(
	array('label'=>'Lista de Empresas', 'url'=>array('index')),
	array('label'=>'Administrar Empresas', 'url'=>array('admin')),
);
?>

<h1>Crear Empresa</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'person'=>$person,'lugar'=>$lugar,'datos'=>$datos)); ?>