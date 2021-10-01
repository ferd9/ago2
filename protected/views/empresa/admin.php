<?php
$this->breadcrumbs=array(
	'Lista de Empresa'=>array('index'),
	'Administrar Empresas',
);

$this->menu=array(
	array('label'=>'Lista de Empresas', 'url'=>array('index')),
	array('label'=>'Crear Empresa', 'url'=>array('create')),
);

?>

<h1>Administrar Empresas</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'empresa-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'idempresa',
		array(
                'name'=>'empresa',
                //'header'=>'Nivel de Acceso',
                'value'=>'$data->empresa0->nombre'),
		'ruc',
                array(
                'name' => 'estado',
                'value' => '($data->estado == 1) ? "✔ - Activo" : "✗ - Inactivo"',
                'htmlOptions' => array('style' => 'text-align: center;'),),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
