<?php
$this->breadcrumbs=array(
	'Lista de Almacenes'=>array('index'),
	'Administracion de Almacenes',
);

$this->menu=array(
	array('label'=>'Lista de Almacenes', 'url'=>array('index')),
	array('label'=>'Crear Almacen', 'url'=>array('create')),
);
?>

<h1>Administracion de Almacenes</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'almacen-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'idalmacen',
		array(
                'name'=>'idempresa',
                //'header'=>'Nivel de Acceso',
                'value'=>'$data->idempresa0->ruc'),
		'nombre',
		'direccion',
		'telefono',
		'fax',
		'anexo',
                array(
                'name' => 'estado','value' => '($data->estado == 1) ? "✔ - Activo" : "✗ - Inactivo"',
                'htmlOptions' => array('style' => 'text-align: center;'),),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
