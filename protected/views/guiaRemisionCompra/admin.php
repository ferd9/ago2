<?php
$this->breadcrumbs=array(
	'Lista de Guia Remision Compra'=>array('index'),
	'Administrar Guia Remision Compra',
);

$this->menu=array(
	array('label'=>'Lista de Guia Remision Compra', 'url'=>array('index')),
	array('label'=>'Crear Guia Remision Compra', 'url'=>array('create')),
);
?>

<h1>Administrar Guia Remision Compra</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'guia-remision-compra-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'idguia_remision_compra',
                array(
                'name'=>'transporte',
                'header'=>'Transporte',
                'value'=>'$data->transporte0->razon_social'),
                array(
                'header'=>'Proveedor',
                'value'=>'$data->idproveedor0->proveedor0->nombrecompleto'),
		'numero_documento',
		'numero_origen',
		//'nombre_origen',
		'direccion_origen',
                'fecha_traslado',
		/*
		
		'fecha_registro',
		'numero_orden_compra',
		'flete',
		'estado',
		'almacen',
		'usuario',
		'idproveedor',
		*/
		array(
			'class'=>'CButtonColumn',
                        'header'=>'Mostrar',
                        'template'=>'{view}',
		),
	),
)); ?>
