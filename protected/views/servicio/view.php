<?php
$this->breadcrumbs=array(
	'Lista de Servicios'=>array('index'),
	'Vista del Servicio: '.$model->idservicio,
);

$this->menu=array(
	array('label'=>'Lista de Servicio', 'url'=>array('index')),
	array('label'=>'Crear Servicio', 'url'=>array('create')),
	array('label'=>'Actualizar Servicio', 'url'=>array('update', 'id'=>$model->idservicio)),
	//array('label'=>'Borrar Servicio', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idservicio),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Servicios', 'url'=>array('admin')),
);
?>

<h1>Vista del Servicio: <?php echo $model->idservicio;?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
                array('label'=>'Servicio', 'value'=>$model->nombreservicio),
                array('label'=>'Moneda', 'value'=>$model->idtipoMoneda0->descripcion),
                array('label'=>'Precio', 'value'=>$model->precioservicio),
	),
)); ?>
