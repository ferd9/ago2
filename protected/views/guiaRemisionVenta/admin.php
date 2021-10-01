<?php
$this->breadcrumbs=array(
	'Lista Guia Remision Ventas'=>array('index'),
	'Administrar Guia Remision Venta',
);

$this->menu=array(
	array('label'=>'Lista Guia Remision Venta', 'url'=>array('index')),
	array('label'=>'Crear Guia Remision Venta', 'url'=>array('create')),
);
?>

<h1>Administrar Guia Remision Venta</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'guia-remision-venta-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
                'name'=>'idtransporte',
                'header'=>'Transporte',
                'value'=>'$data->idtransporte0->razon_social'),
                array(
                'header'=>'Cliente',
                'value'=>'$data->idcliente0->cliente0->nombrecompleto'),
		'numero_documento',
		'direccion_origen',
		'direccion_destino',
		'fecha_traslado',
		/*'almacen',
		'estado',
		'usuario',
		*/
		array(
			'class'=>'CButtonColumn',
                        'header'=>'Mostrar',
                        'template'=>'{view}',
		),
	),
)); ?>
