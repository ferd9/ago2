<?php
$da=$model->idtipoDocumento0->descripcion." / ".$model->numero_documento;
$this->breadcrumbs=array(
	'Lista de Compras'=>array('index'),
	'Vista Compra '.$da,
);

$this->menu=array(
	array('label'=>'Lista de Compras', 'url'=>array('index')),
	//array('label'=>'Crear una Compra', 'url'=>array('create')),
	//array('label'=>'Update Compra', 'url'=>array('update', 'id'=>$model->idcompra)),
	//array('label'=>'Delete Compra', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idcompra),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Compras', 'url'=>array('admin')),
);
?>

<h1>Vista Compra - 
<?php
echo $da; ?></h1>
<?php
$estado_pago="";
switch($model->estado_pago)
                {
                case 'C':
                $estado_pago='Cancelado';
                break;
                case 'P':
                $estado_pago= 'Pendiente';
                break;
                default :
                    $estado_pago= "";
                }
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
                array('label'=>'Proveedor','value'=>$model->idproveedor0->proveedor0->nombrecompleto),
                array('label'=>'Tipo Documento','value'=>$model->idtipoDocumento0->descripcion),
                array('label'=>'Nº Documento','value'=>$model->numero_documento),
                array('label'=>'Fecha Compra','value'=>$model->fecha_compra),
                array('label'=>'Sub Total','value'=>$model->sub_total),
                array('label'=>'IGV','value'=>$model->igv),
                array('label'=>'Total','value'=>$model->total),
		array('label'=>'Estado de Pago','value'=>$estado_pago),
                array('label'=>'Tipo de Pago','value'=>$model->idtipoPago0->descripcion),
                array('label'=>'Observacion','value'=>$model->observacion),
	),
)); ?>


<?php $this->renderPartial('/pcompraVista/admin',array(
	'model'=>$pcompraVista,
)); ?>



  <?php /*
$url=Yii::app()->request->baseUrl;
echo CHtml::button('Ver Productos de esta Compra', array(
        'name'=>'Ver Productos de esta Compra',
        'onclick'=>"window.open ('?r=pcompraVista/admin', 'nom_interne_de_la_fenetre', config='height=400, width=770, toolbar=no, menubar=no, scrollbars=yes, resizable=no, location=no, directories=no, status=no')"
));
*/
 ?>