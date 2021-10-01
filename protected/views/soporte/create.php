<?php
$this->breadcrumbs=array(
	'Lista'=>array('index'),
	'Crear Ingreso',
);

$this->menu=array(
	array('label'=>'Lista', 'url'=>array('index')),
        array('label'=>'Atencion a Ingresar', 'url'=>array('create')),
	array('label'=>'Administrar', 'url'=>array('admin')),
        array('label'=>'Agregar un Cliente', 'url'=>array('cliente/create'),'linkOptions' => array('target'=>'_blank')),
        array('label'=>'Agregar una Venta', 'url'=>array('venta/create&t=fv'),'linkOptions' => array('target'=>'_blank')),
        //array('label'=>'Agregar nuevo accesorio', 'url'=>array('accesoriosSoporte/create'),'linkOptions' => array('target'=>'_blank')),
            );


?>
<h1>Crear Ingreso</h1>
<?php
echo $this->renderPartial('_form', array('model'=>$model,'cliente'=>$cliente,'garantia'=>$garantia,'venta'=>$venta,'detalle_venta'=>$detalle_venta,'accesoriosSoporte'=>$accesoriosSoporte));
?>
