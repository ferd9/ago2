<?php
$this->breadcrumbs=array(
	'Lista de Productos'=>array('index'),
	'Crear Producto',
);

$this->menu=array(
	array('label'=>'Listar Producto', 'url'=>array('index')),
	array('label'=>'Administrar Producto', 'url'=>array('admin')),
);
?>

<h1>Crear Producto</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'categoria'=>$categoria,'marca'=>$marca,'modelo'=>$modelo,'tipomoneda'=>$tipomoneda,'igv'=>$igv)); ?>