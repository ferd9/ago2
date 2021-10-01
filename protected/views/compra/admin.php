<?php
$this->breadcrumbs=array(
	'Lista de Compras'=>array('index'),
	'Administrar Compras',
);

$this->menu=array(
	array('label'=>'Lista de Compras', 'url'=>array('index')),
	//array('label'=>'Crear una Compra', 'url'=>array('create')),
);

?>

<h1>Administrar Compras</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'compra-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
                'name'=>'numero_documento',
                'header'=>'Nro Documento',
                'value'=>'$data->numero_documento'),
                array(
                'name'=>'fecha_compra',
                'header'=>'Fecha Compra',
                'value'=>'$data->fecha_compra'),
	         array(

                'header'=>'Proveedor',
                'value'=>'$data->idproveedor0->proveedor0->nombrecompleto'),
            	array(
                'name'=>'idtipo_documento',
                'header'=>'Tipo Documento',
                'value'=>'$data->idtipoDocumento0->descripcion'),
	         array(
                'name'=>'idtipo_pago',
                'header'=>'Tipo Pago',
                'value'=>'$data->idtipoPago0->descripcion'),
                array(
                'name'=>'total',
                'header'=>'Total',
                'value'=>'$data->total'),
		/*
		'fecha_registro',
		'hora',
		'subtotal',
		'igv',
		'importe_total',
		'estado_venta',
		'estado_venta_pago',
		'estado',
		'usuario',
		'almacen',
		*/
		array(
			'class'=>'CButtonColumn',
                        'header'=>'Mostrar',
                        'template'=>'{view}',
		),
	),
)); ?>
