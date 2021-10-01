<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tmptrans-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
                'name'=>'idproducto',
                'header'=>'CodProducto',
                'value'=>'$data->idproducto'),
		array(
                'name'=>'nombreproducto',
                'header'=>'Producto',
                'value'=>'$data->nombreproducto'),
		array(
                'header'=>'Precio Compra',
                'value'=>'$data->preciocompra'),
		array(
                'header'=>'Precio sin IGV',
                'value'=>'$data->preciosinigv'),
		array(
                'header'=>'Precio con IGV',
                'value'=>'$data->precioconigv'),
		array(
                'header'=>'Stock Actual',
                'value'=>'$data->stockproducto'),
		array(
			'class'=>'CButtonColumn',
                        'header'=>'Añadir',
                        'template'=>'{seleccionar}',
                        'buttons'=>array(
                            'seleccionar' => array
                                    (
                                        'imageUrl'=>Yii::app()->request->baseUrl.'/images/icon_select.gif',
                                        'url'=>'Yii::app()->createUrl("TmptransSave/create", array("id"=>$data->idtmptras))',

                                    ),
                                ),
                ),
	),
)); ?>
