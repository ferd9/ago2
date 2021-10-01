<?php
$this->breadcrumbs=array(
	'Lista de Productos'=>array('index'),
	'Producto: '.$model->idproducto=>array('view','id'=>$model->idproducto),
	'Actualizar Producto: '.$model->idproducto,
);

$this->menu=array(
	array('label'=>'Listar Producto', 'url'=>array('index')),
	array('label'=>'Crear Producto', 'url'=>array('create')),
	array('label'=>'Ver Producto', 'url'=>array('view', 'id'=>$model->idproducto)),
	array('label'=>'Administrar Producto', 'url'=>array('admin')),
);
?>

<h2>Actualizar Producto : <?php echo $model->descripcion; ?></h2>

<?php echo $this->renderPartial('_form', array('model'=>$model,'proveedor'=>$proveedor,'categoria'=>$categoria,'marca'=>$marca,'modelo'=>$modelo,'igv'=>$igv,'tipomoneda'=>$tipomoneda)); ?>