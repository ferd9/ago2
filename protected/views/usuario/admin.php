<?php
$this->breadcrumbs=array(
	'Lista de Usuarios'=>array('index'),
	'Administracion de Usuarios',
);

$this->menu=array(
	array('label'=>'Lista de Usuario', 'url'=>array('index')),
	array('label'=>'Crear Usuario', 'url'=>array('create')),
);

?>

<h1>Administracion de Usuarios</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'usuario-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'login',
                array(
                'name'=>'nivel',
                'header'=>'Nivel de Acceso',
                'value'=>'$data->nivel0->descripcion'),
                array(
                'name'=>'usuario',
                'header'=>'Nombre de Usuario',
                'value'=>'$data->usuario0->nombre'),
                array(
                'name'=>'almacen',
                'header'=>'Almacen',
                'value'=>'$data->almacen0->nombre'),
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
