<?php
$this->breadcrumbs=array(
	'Lista de Movimiento de Caja'=>array('index'),
	'Administracion de Movimientos Caja',
);
$fechactual=date('Y-m-d');
$this->menu=array(
	array('label'=>'Lista de Movimientos Caja', 'url'=>array('index')),
	array('label'=>'Movimiento de Caja - '.$fechactual.'', 'url'=>array('create')),
);

?>

<h1>Administracion de Movimientos Caja</h1>


<?php

$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'caja-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'fecha_caja',
		'hora',
		'descripcion',
                array(
                'name'=>'idtipo_movimiento',
                'header'=>'Tipo Movimiento',
                'value'=>'$data->idtipoMovimiento0->descripcion'),
		'monto',
                array(
                'name'=>'idtipo_moneda',
                'header'=>'Moneda',
                'value'=>'$data->idtipoMoneda0->descripcion'),
		array(
                'name'=>'almacen',
                'header'=>'Almacen',
                'value'=>'$data->almacen0->nombre'),          
		array(
                'name' => 'estado',
                'value' => '($data->estado == 1) ? "✔ - Activo" : "✗ - Inactivo"',
                ),
		array(
			'class'=>'CButtonColumn',
                        'header'=>'Opciones',
                        'template'=>'{view}',

		),
	),
)); ?>
