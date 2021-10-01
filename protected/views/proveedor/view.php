<?php
$this->breadcrumbs=array(
	'Lista de Proveedores'=>array('index'),
	'Vista del Proveedor # '.$model->idproveedor,
);

$this->menu=array(
	array('label'=>'Lista de Proveedores', 'url'=>array('index')),
	array('label'=>'Crear Proveedor', 'url'=>array('create')),
	array('label'=>'Actualizar Proveedor', 'url'=>array('update', 'id'=>$model->idproveedor)),
	array('label'=>'Borrar Proveedor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idproveedor),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Proveedores', 'url'=>array('admin')),
       // array('label'=>'Comprar', 'url'=>array("compra/selectProducts",'id'=>$model->idproveedor)),
);
?>

<h1>Vista del Proveedor #<?php echo $model->idproveedor; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'idproveedor',
                array('name'=>'proveedor','value'=>$model->proveedor0->nombre),
                'ruc',
		'nombre_contacto',
		'descripcion_producto',

                array('label'=>'Departamento','value'=>UbigeoController::viewDepartamento($model->proveedor0->ubigeo)),
                array('label'=>'Provincia','value'=>UbigeoController::viewProvincia($model->proveedor0->ubigeo)),
                array('label'=>'Distrito','value'=>UbigeoController::viewDistrito($model->proveedor0->ubigeo)),
                array('name'=>'direccion','value'=>$model->proveedor0->direccion),
                array('name'=>'celular','value'=>$model->proveedor0->celular),
                array('name'=>'telefono','value'=>$model->proveedor0->telefono),
                //array('name'=>'anexo','value'=>$model->proveedor0->anexo),
                //array('name'=>'fax','value'=>$model->proveedor0->fax),
                array('name'=>'email','value'=>$model->proveedor0->email),
                //array('name'=>'zona','value'=>$model->proveedor0->zona),
                array('label'=>'Estado', 'value'=>($model->estado == 1) ? "✔ - Activo" : "✗ - Inactivo"),                
	),
)); ?>
