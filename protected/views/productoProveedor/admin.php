<h1>Lista Producto-Proveedor</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'producto-proveedor-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		array(
                'name'=>'proveedor',
                'header'=>'Proveedor',
                'value'=>'$data->proveedor0->proveedor0->nombre'),
                array(
                'name'=>'producto',
                'header'=>'Producto',
                'value'=>'$data->producto0->descripcion'),
		array(
			'class'=>'CButtonColumn',
                        'header'=>'Ver',
                        'template'=>'{view}',
                        'buttons'=>array(
                            'view' => array
                                    (
                                        'url'=>'Yii::app()->createUrl("producto/view", array("id"=>$data->producto))',

                                    ),
                                ),
                        ),
	),
)); ?>