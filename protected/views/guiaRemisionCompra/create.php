<?php
$this->breadcrumbs=array(
	'Lista de Guia Remision Compra'=>array('index'),
	'Crear Guia Remision Compra',
);

$this->menu=array(
	array('label'=>'Lista Guia Remision Compra', 'url'=>array('index')),
	array('label'=>'Administrar Guia Remision Compra', 'url'=>array('admin')),
        array('label'=>'Agregar un Transporte', 'url'=>array('transporte/create'),'linkOptions' => array('target'=>'_blank')),
        array('label'=>'Agregar un Proveedor', 'url'=>array('proveedor/create'),'linkOptions' => array('target'=>'_blank')),
        );
?>

<h1>Crear Guia Remision Compra</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model,'pguiacompra'=>$pguiacompra)); ?>