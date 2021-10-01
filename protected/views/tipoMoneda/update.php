<?php
$this->breadcrumbs=array(
	'Lista de Monedas'=>array('index'),
	'Moneda: '.$model->descripcion=>array('view','id'=>$model->idtipo_moneda),
	'Actualizar Moneda: '.$model->descripcion,
);

$this->menu=array(
	array('label'=>'Lista Monedas', 'url'=>array('index')),
	array('label'=>'Crear Moneda', 'url'=>array('create')),
	array('label'=>'Ver Moneda', 'url'=>array('view', 'id'=>$model->idtipo_moneda)),
	array('label'=>'Administrar Monedas', 'url'=>array('admin')),
);
?>

<h1>Actualizar Moneda:  <?php echo $model->descripcion; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>