<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pguia-venta-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
		array(
                'name'=>'nomproducto',
                'header'=>'Producto',
                'value'=>'$data->nomproducto'),
		'cantidad',
		'garantia',
		'nro_serie',
		'codigo_barras',
		'descripcion',
                array(
			'class'=>'CButtonColumn',
                        'header'=>'Quitar',
                        'deleteButtonUrl' => 'Yii::app()->createUrl("pguiaventa/delete",array("id"=>$data["idplana"]))',
                        'template'=>'{delete}',

		)
	),
)); ?>
