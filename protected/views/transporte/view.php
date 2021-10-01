<?php
$this->breadcrumbs=array(
	'Lista de Transportes'=>array('index'),
	'Vista Transporte # '.$model->idtransporte,
);

$this->menu=array(
	array('label'=>'Lista de Transporte', 'url'=>array('index')),
	array('label'=>'Crear Transporte', 'url'=>array('create')),
	//array('label'=>'Update Transporte', 'url'=>array('update', 'id'=>$model->idtransporte)),
	//array('label'=>'Delete Transporte', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idtransporte),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Transporte', 'url'=>array('admin')),
);
?>

<h1>Vista Transporte #<?php echo $model->idtransporte; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'idtransporte',
                'razon_social',
                'ruc',
                'licencia_conducir',
		'nro_soat',
                'nro_placa',
		'marca_vehiculo',		
		'certificado_inscripcion',		
		//'usuario',
		array('label'=>'Estado', 'value'=>($model->estado == 1) ? "✔ - Activo" : "✗ - Inactivo"),
	),
)); ?>
