<?php
$this->breadcrumbs=array(
	'Lista de Servicios'=>array('index'),
	'Administrar Servicios',
);

$this->menu=array(
	array('label'=>'Lista de Servicios', 'url'=>array('index')),
	array('label'=>'Crear Servicio', 'url'=>array('create')),
);
?>

<h1>Administrar Servicios</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'servicio-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
                'name'=>'nombreservicio',
                'header'=>'Servicio',
                'value'=>'$data->nombreservicio',
                ),
                array(
                'header'=>'Moneda',
                'value'=>'$data->idtipoMoneda0->descripcion',
                ),
                array(
                'header'=>'Precio',
                'value'=>'$data->precioservicio',
                ),             
		array(
                    'header'=>'Opciones',
                    'class'=>'CButtonColumn',
		),
	),
)); ?>
