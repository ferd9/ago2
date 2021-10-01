<?php
$this->breadcrumbs=array(
	'Lista'=>array('index'),
	'Administrar',
);

$this->menu=array(
	array('label'=>'Lista', 'url'=>array('index')),
	array('label'=>'Tipo de Atencion a Ingresar', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('soporte-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Administrar</h1>

<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'soporte-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
                array(
                'name'=>'idcliente',
                'header'=>'Nombre del Cliente',
                'value'=>'$data->idcliente0->cliente0->nombrecompleto',
                ),
                array(
                'name'=>'fecha_ingreso_soporte',
                'header'=>'Fecha Ingreso Producto',
                'value'=>'$data->fecha_ingreso_soporte',
                ),
                array(
                'name'=>'fecha_salida_producto',
                'header'=>'Fecha Salida Producto',
                'value'=>'$data->fecha_salida_producto',
                ),
                array(
                'name'=>'tipo_atencion',
                'header'=>'Tipo de Atencion',
                'value'=>'($model->tipo_atencion == "g") ? "Garantia" : "Servicio"',),
                'observaciones',
		array(
                'name' => 'estado',
                'value' => '($data->estado == 1) ? "✔ - Activo" : "✗ - Inactivo"',
                ),
		array(
			'class'=>'CButtonColumn',
                        'header'=>'Opciones',
                        'template'=>'{view}',

		),
	),
)); ?>
