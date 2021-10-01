<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pcompra-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
                array(
                'name'=>'cantidad',
                'header'=>'Cantidad',
                'value'=>'$data->cantidad'),
                array(
                'name'=>'nomproducto',
                'header'=>'Producto',
                'value'=>'$data->nomproducto'),
                array(
                'name'=>'moneda',
                'header'=>'Moneda',
                'value'=>'$data->moneda'),
                array(
                'name'=>'precio',
                'header'=>'Precio',
                'value'=>'$data->precio'),
                array(
                'name'=>'tipo_adquisicion',
                'header'=>'Tipo Adquisicion',
                'value'=>'$data->tipo_adquisicion'),
		array(
			'class'=>'CButtonColumn',
                        'header'=>'Quitar',
                        'deleteButtonUrl' => 'Yii::app()->createUrl("pcompra/delete",array("id"=>$data["idplana"]))',
                        'template'=>'{delete}',

		)
	),
)); ?>
