<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'servicio-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
                'name'=>'nombreservicio',
                'header'=>'Servicio',
                'value'=>'$data->nombreservicio',
                ),
                array(
                'header'=>'Moneda',
                'value'=>'$data->idtipoMoneda0->descripcion',
                ),
                array(
                'header'=>'Precio',
                'value'=>'$data->precioservicio',
                ),

                array(
			'class'=>'CButtonColumn',
                        'header'=>'Añadir',
                        'template'=>'{seleccionar}',
                        'buttons'=>array(
                            'seleccionar' => array
                                    (
                                        'imageUrl'=>Yii::app()->request->baseUrl.'/images/icon_select.gif',
                                        'url'=>'Yii::app()->createUrl("selectservicios/GrabarServiciosab", array("id"=>$data->idservicio))',

                                    ),
                                ),
                        ),
	),
)); ?>