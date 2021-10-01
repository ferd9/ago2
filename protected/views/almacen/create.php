<?php
$this->breadcrumbs=array(
	'Lista de Almacenes'=>array('index'),
	'Crear Almacen',
);

$this->menu=array(
	array('label'=>'Lista de Almacenes', 'url'=>array('index')),
	array('label'=>'Administrar Almacenes', 'url'=>array('admin')),
);
?>

<h1>Crear Almacen</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'empresa'=>$empresa,'persona'=>$persona,'mymodel'=>$mymodel)); ?>