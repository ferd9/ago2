<h2 align="center"> Lista Guia Remision Venta</h2>

        <?php
        $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'guia-remision-venta-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
                'name'=>'idtransporte',
                'header'=>'Transporte',
                'value'=>'$data->idtransporte0->razon_social'),
                array(
                'header'=>'Cliente',
                'value'=>'$data->idcliente0->cliente0->nombrecompleto'),
		'numero_documento',
		'direccion_origen',
		'direccion_destino',
		'fecha_traslado',
                array(
			'class'=>'CButtonColumn',
                        'header'=>'Importar',
                        'template'=>'{seleccionar}',
                        'buttons'=>array(
                            'seleccionar' => array
                                    (
                                        'imageUrl'=>Yii::app()->request->baseUrl.'/images/icon_select.gif',
                                        'url'=>'Yii::app()->createUrl("venta/create&t=fv", array("im"=>$data->idguia_remision_venta))',
                                        
                                    ),
                                ),
                ),
	),
));

                                        /*'click'=>"function()
                                        {
                                        window.opener.location.href ='".Yii::app()->request->baseUrl."?r=venta/create&t=fv&im=".$data->idguia_remision_venta."';
                                        window.opener.focus();
                                        self.close();
                                        }",  */
        ?>