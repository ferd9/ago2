<?php
$this->breadcrumbs=array(
	'Lista de Proveedores'=>array('index'),
	'Administracion de Proveedores',
);

$this->menu=array(
	array('label'=>'Lista de Proveedores', 'url'=>array('index')),
	array('label'=>'Crear Proveedor', 'url'=>array('create')),
);

?>

<h1>Administracion de Proveedores</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'proveedor-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		//'idproveedor',
                array(
                'name'=>'proveedor',
                'value'=>'$data->proveedor0->nombre'),
		'ruc',		
		'usuario',
		'nombre_contacto',		
		'descripcion_producto',
                array(
                'name' => 'estado',
                'value' => '($data->estado == 1) ? "✔-Activo" : "✗-Inactivo"',
                'htmlOptions' => array('style' => 'text-align: center;'),
                ),        
		array(
			'class'=>'CButtonColumn',
                        'header'=>'Acciones',
		),
                /*array(
                        'class'=>'CButtonColumn',
                        'header'=>'Realizar Pedido',
                        'template'=>'{seleccionar}',
                        'buttons'=>array(

                            'seleccionar' => array
                                    (
                                        'label'=>'Realizar Pedido',
                                        'imageUrl'=>Yii::app()->request->baseUrl.'/images/icono_registro.png',
                                        'url'=>'Yii::app()->createUrl("compra/create", array("id"=>$data->proveedor))',

                                    ),
                                ),
                    ),*/
	),
)); ?>
