<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tmptrans-save-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
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
                'name'=>'preciocompra',
                'header'=>'Precio Compra',
                'value'=>'$data->preciocompra'),
		array(
                'name'=>'preciosinigv',
                'header'=>'Precio sin IGV',
                'value'=>'$data->preciosinigv'),
		array(
                'name'=>'precioconigv',
                'header'=>'Precio con IGV',
                'value'=>'$data->precioconigv'),
		array(
                'name'=>'stockproducto',
                'header'=>'Cantidad',
                'value'=>'$data->stockproducto'),
		array(
			'class'=>'CButtonColumn',
                        'header'=>'Quitar',
                        'deleteButtonUrl' => 'Yii::app()->createUrl("tmptransSave/delete",array("id"=>$data["idtmptras"]))',
                        'template'=>'{delete}',

		)
	),
)); ?>
