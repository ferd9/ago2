<?php
$this->breadcrumbs=array(
	'Producto Proveedors'=>array('index'),
	$model->idproducto_proveedor,
);

$this->menu=array(
	array('label'=>'Lista de Producto-Proveedor', 'url'=>array('index')),
	array('label'=>'Asignar Producto-Proveedor', 'url'=>array('create')),
	array('label'=>'Actualizar Producto-Proveedor', 'url'=>array('update', 'id'=>$model->idproducto_proveedor)),
	array('label'=>'Borrar Producto-Proveedor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idproducto_proveedor),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Producto-Proveedor', 'url'=>array('admin')),
);
?>

<h1>Vista Producto-Proveedor #<?php echo $model->idproducto_proveedor; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idproducto_proveedor',
		array('label'=>'Proveedor', 'value'=>$model->proveedor0->proveedor0->nombre),
		array('label'=>'Producto', 'value'=>$model->producto0->descripcion),
                array('label'=>'Categoria', 'value'=>$model->producto0->idcategoria0->idcategoria0->idcategoria0->descripcion),
                array('label'=>'Marca', 'value'=>$model->producto0->idmarca0->idmarca0->descripcion),
                array('label'=>'Modelo', 'value'=>$model->producto0->idmodelo0->descripcion),
	),
)); ?>
