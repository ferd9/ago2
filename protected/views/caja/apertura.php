<?php
$this->breadcrumbs=array(
	'Cajas'=>array('index'),
	'Create',
);

?>

<h1>Apertura de Caja || <?php echo $fechactual=date('Y-m-d');?></h1>

<?php echo $this->renderPartial('_form_apertura', array('model'=>$model,'almacen'=>$almacen,'tipoMoneda'=>$tipoMoneda,'tipomovimiento'=>$tipomovimiento)); ?>