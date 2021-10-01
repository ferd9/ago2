<?php
$this->breadcrumbs=array(
	'Lista de Monedas'=>array('index'),
	'Administrar Monedas',
);

$this->menu=array(
	array('label'=>'Lista de Monedas', 'url'=>array('index')),
	array('label'=>'Crear Moneda', 'url'=>array('create')),
);
?>

<h1>Administrar Monedas</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tipo-moneda-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
                'name'=>'descripcion',
                'header'=>'Moneda',
                'value'=>'$data->descripcion'),
		array(
                'name'=>'cambio',
                'header'=>'Tipo Cambio',
                'value'=>'$data->cambio'),
		array(
			'class'=>'CButtonColumn',
                        'header'=>'Ver',
                        'template'=>'{view}',
		),
                array(
			'class'=>'CButtonColumn',
                        'header'=>'Actualizar',
                        'template'=>'{update}',
		),
	),
)); ?>
