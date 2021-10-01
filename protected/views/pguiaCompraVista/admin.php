<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pguia-compra-vista-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
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
	),
)); ?>
