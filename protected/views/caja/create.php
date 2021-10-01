<?php
$fechactual=date('Y-m-d');
$this->breadcrumbs=array(
	'Lista de Movimiento de Caja'=>array('index'),
	'Movimiento de Caja - '.$fechactual.'',
);

$this->menu=array(
	array('label'=>'Lista de Movimientos Caja', 'url'=>array('index')),
	array('label'=>'Administrar Movimientos Caja', 'url'=>array('admin')),
);
?>

<h1>Movimiento de Caja || <?php echo $fechactual=date('Y-m-d');?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'almacen'=>$almacen,'tipoMoneda'=>$tipoMoneda,'tipomovimiento'=>$tipomovimiento)); ?>