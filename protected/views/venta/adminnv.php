<h1>Lista de Notas Ventas</h1>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'venta-grid',
	'dataProvider'=>$model->searchntv(),
	'filter'=>$model,
	'columns'=>array(
                array(
                'name'=>'numero_documento',
                'header'=>'Nro Documento',
                'value'=>'$data->numero_documento'),
                array(
                'name'=>'fecha_venta',
                'header'=>'Fecha Venta',
                'value'=>'$data->fecha_venta'),
	         array(

                'header'=>'Cliente',
                'value'=>'$data->idcliente0->cliente0->nombre'),
            	array(
                'header'=>'Tipo Documento',
                'value'=>'$data->idtipoDocumento0->descripcion'),
	         array(
                'name'=>'idtipo_pago',
                'header'=>'Tipo Pago',
                'value'=>'$data->idtipoPago0->descripcion'),
                array(
                'header'=>'Total',
                'value'=>'$data->importe_total'),
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