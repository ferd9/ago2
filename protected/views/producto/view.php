<?php
$this->breadcrumbs=array(
	'Lista de Productos'=>array('index'),
	'Producto: '.$model->idproducto,
      
);

$this->menu=array(
	array('label'=>'Listar Producto', 'url'=>array('index')),
	array('label'=>'Crear Producto', 'url'=>array('create')),
	array('label'=>'Actualzar Producto', 'url'=>array('update', 'id'=>$model->idproducto)),
	//array('label'=>'Eliminar Producto', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idproducto),'confirm'=>'Esta Seguro de Eliminar los Datos?')),
	array('label'=>'Administrar Producto', 'url'=>array('admin')),
);
?>

<h1>Producto:<?php echo $model->descripcion; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
                array('label'=>'Proveedor','value'=>$proveedor),
                'descripcion',
                array('label'=>'Categorias','value'=>$model->idcategoria0->idcategoria0->idcategoria0->descripcion),
		array('label'=>'Marca','value'=>$model->idmarca0->idmarca0->descripcion),
		array('label'=>'Modelo','value'=>$model->idmodelo0->descripcion),
		array('label'=>'Moneda','value'=>$model->idtipoMoneda0->descripcion),
		array('label'=>'Igv','value'=>$model->idigv0->descripcion),
		'precio_compra',
		'precio_sin_igv',
		'precio_con_igv',
		'descuento',
		'unidad_medida',
                array(
                'name'=>'foto',
                'type'=>'image',
                'value'=>Yii::app()->request->baseUrl."/images/".'_'.$model->foto,
                ),
	
		
	),
)); ?>
