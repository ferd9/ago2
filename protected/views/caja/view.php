<?php
$this->breadcrumbs=array(
	'Lista de Movimiento de Caja'=>array('index'),
	'Vista de Movimiento Caja || '.$model->fecha_caja,
);
$fechactual=date('Y-m-d');
$this->menu=array(
	array('label'=>'Lista de Movimientos Caja', 'url'=>array('index')),
	array('label'=>'Movimiento de Caja - '.$fechactual.'', 'url'=>array('create')),
	// array('label'=>'Update Caja', 'url'=>array('update', 'id'=>$model->idcaja)),
	// array('label'=>'Delete Caja', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idcaja),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Movimientos Caja', 'url'=>array('admin')),
);
?>

<h1>Vista de Movimiento Caja || <?php echo $model->fecha_caja; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'fecha_caja',
		'hora',
		'descripcion',
		//'idtipo_movimiento',
                array('label'=>'Tipo Movimiento','value'=>$model->idtipoMovimiento0->descripcion),
		'monto',
                array('label'=>'Moneda','value'=>$model->idtipoMoneda0->descripcion),
                array('label'=>'Almacen','value'=>$model->almacen0->nombre),
		array('label'=>'Estado', 'value'=>($model->estado == 1) ? "✔ - Activo" : "✗ - Inactivo"),
		'usuario',
	),
)); ?>
