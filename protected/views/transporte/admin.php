<?php
$this->breadcrumbs=array(
	'Lista de Transportes'=>array('index'),
	'Administrar Transporte',
);

$this->menu=array(
	array('label'=>'Lista de Transporte', 'url'=>array('index')),
	array('label'=>'Crear Transporte', 'url'=>array('create')),
);
?>

<h1>Administrar Transporte</h1>



<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'transporte-grid',
	'dataProvider'=>$model->search(),
        'filter'=>$model,
	'columns'=>array(
		//'idtransporte',
                'razon_social',
                'ruc',
                'licencia_conducir',
		'nro_soat',
                'nro_placa',
		'marca_vehiculo',		
		'certificado_inscripcion',		
		array('name'=>'estado','value'=>'($data->estado == 1) ? "✔-Activo" : "✗-Inactivo"','htmlOptions'=>array('style'=>'text-align: center;')),
		array(
			'class'=>'CButtonColumn',
                        'header'=>'Mostrar',
                        'template'=>'{view}',
		),
	),
)); ?>
