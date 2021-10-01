<?php
$this->breadcrumbs=array(
	'Lista de Monedas'=>array('index'),
	'Moneda: '.$model->descripcion,
);

$this->menu=array(
	array('label'=>'Lista de Monedas', 'url'=>array('index')),
	array('label'=>'Crear Moneda', 'url'=>array('create')),
	array('label'=>'Actualizar Moneda', 'url'=>array('update', 'id'=>$model->idtipo_moneda)),
	//array('label'=>'Delete TipoMoneda', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idtipo_moneda),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Monedas', 'url'=>array('admin')),
);
?>

<h1>Moneda:  <?php echo $model->descripcion; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
                array('label'=>'Tipo de Cambio:','value'=>$model->cambio),
	),
)); ?>
