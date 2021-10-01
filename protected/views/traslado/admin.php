<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'movimientoalmacen-grid',
	'dataProvider'=>$model->search(),
        'filter'=>$model,
	'columns'=>array(
                array(
                'name'=>'fecha_movimiento',
                'header'=>'Fecha',
                'value'=>'$data->fecha_movimiento'),
                array(
                'header'=>'Hora',
                'value'=>'$data->hora_movimiento'),
                array(
                'name'=>'idtipo_movimiento',
                'header'=>'Tipo Movimiento',
                'value'=>'$data->idtipoMovimiento0->descripcion'),
                array(
                'name'=>'idalmacen',
                'header'=>'Almacen',
                'value'=>'$data->idalmacen0->nombre'),
                array(
                'name'=>'idproducto',
                'header'=>'Producto',
                'value'=>'$data->idproducto0->descripcion'),
                array(
                'header'=>'Cantidad',
                'value'=>'$data->cantidad'),
                array(
                'name'=>'usuario',
                'header'=>'Usuario',
                'value'=>'$data->usuario'),
                array(
                'header'=>'Descripcion',
                'value'=>'$data->desc_tipo_movimiento'),
	),
)); ?>