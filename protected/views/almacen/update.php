<?php
$this->breadcrumbs=array(
	'Lista de Almacenes'=>array('index'),
	'Vista del Almacen #'.$model->idalmacen.''=>array('view','id'=>$model->idalmacen),
	'Actualizar',
);

$this->menu=array(
	array('label'=>'Lista de Almacenes', 'url'=>array('index')),
	array('label'=>'Crear Almacen', 'url'=>array('create')),
	array('label'=>'Vista del Almacen', 'url'=>array('view', 'id'=>$model->idalmacen)),
	array('label'=>'Administrar Almacenes', 'url'=>array('admin')),
);
?>

<h1>Actualizar Almacen #<?php echo $model->idalmacen; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'empresa'=>$empresa,'persona'=>$persona,'mymodel'=>$mymodel)); ?>