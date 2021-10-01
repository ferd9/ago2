<?php
$this->breadcrumbs=array(
	'Lista de Clientes'=>array('index'),
	'Administracion de Clientes',
);

$this->menu=array(
	array('label'=>'Lista de Clientes', 'url'=>array('index')),
	array('label'=>'Crear Cliente', 'url'=>array('create')),
);
?>

<h1>Administracion de Clientes</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cliente-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
                'name'=>'cliente',
                'header'=>'Nombre del Cliente',
                'value'=>'$data->cliente0->nombre'),
                array(
                'name'=>'idtipo_cliente',
                'header'=>'Tipo Cliente',
                'value'=>'$data->idtipoCliente0->descripcion'),
		'numero_documento',
		array(
                'name' => 'estado',
                'value' => '($data->estado == 1) ? "✔ - Activo" : "✗ - Inactivo"',
                ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>