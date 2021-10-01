<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pguia-compra-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		array(
                'name'=>'nomproducto',
                'header'=>'Producto',
                'value'=>'$data->nomproducto'),
		array(
                'name'=>'cantidad',
                'header'=>'Cantidad',
                'value'=>'$data->cantidad'),
		'garantia',
		'nro_serie',		
		'codigo_barras',
		'descripcion',
		/*'almacen',
		'usuario',
		*/
		array(
			'class'=>'CButtonColumn',
                        'header'=>'Quitar',
                        'deleteButtonUrl' => 'Yii::app()->createUrl("pguiacompra/delete",array("id"=>$data["idplana"]))',
                        'template'=>'{delete}',

		)
	),
)); ?>
