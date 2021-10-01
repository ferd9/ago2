<?php
$this->breadcrumbs=array(
	'Lista de Empresa'=>array('index'),
	'Vista Empresa # '.$model->idempresa=>array('view','id'=>$model->idempresa),
	'Actualizar Empresa '.$model->idempresa,
);

$this->menu=array(
	array('label'=>'Lista de Empresas', 'url'=>array('index')),
	array('label'=>'Crear Empresa', 'url'=>array('create')),
	array('label'=>'Vista de Empresa', 'url'=>array('view', 'id'=>$model->idempresa)),
	array('label'=>'Administrar Empresas', 'url'=>array('admin')),
);
?>

<h1>Actualizar Empresa <?php echo $model->idempresa; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'person'=>$person,'lugar'=>$lugar,'datos'=>$datos,)); ?>