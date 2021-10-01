<?php
$this->breadcrumbs=array(
	'Lista de Productos'=>array('index'),
	'Administrar Productos',
);

$this->menu=array(
	array('label'=>'Listar Productos', 'url'=>array('index')),
	array('label'=>'Crear Producto', 'url'=>array('create')),
);

?>

<h1>Administrar Productos</h1>

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'producto-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		 array(
                'name'=>'idcategoria',
                'header'=>'Categoria',
                'value'=>'$data->idcategoria0->idcategoria0->idcategoria0->descripcion'),
                array(
                'name'=>'idmarca',
                'header'=>'Marca',
                'value'=>'$data->idmarca0->idmarca0->descripcion'),
                array(
                'name'=>'idmodelo',
                'header'=>'Modelo',
                'value'=>'$data->idmodelo0->descripcion'),
  
                array(
                'name'=>'descripcion',
                'header'=>'Descripcion',
                'value'=>'$data->descripcion'),
                array(
                'name'=>'precio_compra',
                'header'=>'Precio Compra',
                'value'=>'$data->precio_compra'),
                 array(
                'name'=>'precio_con_igv',
                'header'=>'Precio Venta',
                'value'=>'$data->precio_con_igv'),
                array(
                'name'=>'idtipo_moneda',
                'header'=>'Moneda',
                'value'=>'$data->idtipoMoneda0->descripcion'),
                      /*
		'descripcion',
		'precio_compra',
		'precio_sin_igv',
		'precio_con_igv',
		'descuento',
		'unidad_medida',
		'foto',
		'estado',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
