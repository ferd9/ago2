<?php
$this->breadcrumbs=array(
	'Lista'=>array('index'),
	'Vista # '.$model->idsoporte,
);

$this->menu=array(
	array('label'=>'Lista', 'url'=>array('index')),
	array('label'=>'Atencion a Ingresar', 'url'=>array('create')),
	//array('label'=>'Actualizar', 'url'=>array('update', 'id'=>$model->idsoporte)),
	//array('label'=>'Borrar', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idsoporte),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar', 'url'=>array('admin')),
);
?>

<h1>Vista #<?php echo $model->idsoporte; ?></h1>
<?php


?>

<?php
$estado_producto="";
switch($model->estado_producto)
                {
                case 'n':
                $estado_producto='No pasa garantia';
                break;
                case 'c':
                $estado_producto= 'Nota Credito';
                break;
                case 'r':
                $estado_producto= 'Reparacion-Soporte';
                break;
                case 'e':
                $estado_producto= 'Reparacion-Entregado';
                break;
                case 'd':
                $estado_producto= 'Derivado a Proveedor';
                break;
                default :
                    $estado_producto= "";
                }


$tipo_atencion_="";
switch($model->tipo_atencion)
                {
                case 'g':
                $tipo_atencion_='Garantía';
                break;
                case 's':
                $tipo_atencion_= 'Servicio';
                break;
                default :
                    $tipo_atencion_= "";
                }
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
                array('label'=>'Nombre Cliente', 'value'=>$model->idcliente0->cliente0->nombrecompleto),
		array('label'=>'Fecha Ingreso Producto', 'value'=>$model->fecha_ingreso_soporte),
                array('label'=>'Fecha Salida Producto', 'value'=>$model->fecha_salida_producto),
                array('label'=>'Tipo de Atencion', 'value'=>$tipo_atencion_),
                array('label'=>'Estado Producto', 'value'=>$model->estado_producto),
                array('label'=>'Observaciones', 'value'=>$model->observaciones),
                array('label'=>'Numero Documento Venta', 'value'=>$docvent),
                array('label'=>'Garantia Venta', 'value'=>$garant),
                array('label'=>'Fecha Recepcion Garantia', 'value'=>$fechrecp),
                array('label'=>'Fecha Entrega Garantia', 'value'=>$fechentrega),
                array('label'=>'Observacion Garantia', 'value'=>$observaciongarantia),
		array('label'=>'Estado', 'value'=>($model->estado == 1) ? "✔ - Activo" : "✗ - Inactivo"),
	),
)); ?>


<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'accesorios-soporte-grid',
	'dataProvider'=>$accesoriosSoporte->search(),
	'columns'=>array(
                array(
                'name'=>'cantidad_soporte',
                'header'=>'Cantidad',
                'value'=>'$data->cantidad_soporte'),
                array(
                'name'=>'descripcion_soporte',
                'header'=>'Descripcion',
                'value'=>'$data->descripcion_soporte'),
                array(
                'name'=>'serie_soporte',
                'header'=>'Serie',
                'value'=>'$data->serie_soporte'),
		array(
                'name'=>'codigobarras_soporte',
                'header'=>'CodigoBarra',
                'value'=>'$data->codigobarras_soporte'),
	),
)); ?>

<?php
$connection=  Yii::app()->db;
$sqlStatement="CALL limpiartablaaccesoriossoporte();";
$command=$connection->createCommand($sqlStatement);
$command->execute();
?>