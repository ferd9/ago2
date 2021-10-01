<?php
$titulo="";
$item="";
switch($tipodoc)
                {
                case 'fv':
                $titulo='Factura Venta';
                $item=1;
                break;
                case 'bv':
                $titulo='Boleta Venta';
                $item=2;
                break;
                case 'nv':
                $titulo='Nota Venta';
                $item=3;
                break;
                case 'cv':
                $titulo='Cotizacion';
                $item=4;
                break;
                default :
                    $titulo= "";
                }
?>
<?php
$this->breadcrumbs=array(
	'Lista de Ventas'=>array('index'),
	'Crear '.$titulo,
);

$this->menu=array(
	array('label'=>'Lista de Venta', 'url'=>array('index')),
	array('label'=>'Administrar Venta', 'url'=>array('admin')),
        array('label'=>'Agregar un Cliente', 'url'=>array('cliente/create'),'linkOptions' => array('target'=>'_blank')),
);
?>

<h1>Crear <?php echo $titulo;?></h1>


<?php
//
if($importguia<>'')
{
echo $this->renderPartial('_form',
array('model'=>$model,'importguia'=>$importguia,'SaveUs'=>$SaveUs,'precioVentaTmp'=>$precioVentaTmp,'item'=>$item,));
}
elseif($importcotiza<>'')
{
echo $this->renderPartial('_form',
array('model'=>$model,'importcotiza'=>$importcotiza,'SaveUs'=>$SaveUs,'precioVentaTmp'=>$precioVentaTmp,'item'=>$item,));
}
elseif($importnota<>'')
{
echo $this->renderPartial('_form',
array('model'=>$model,'importnota'=>$importnota,'SaveUs'=>$SaveUs,'precioVentaTmp'=>$precioVentaTmp,'item'=>$item,));
}


else
{
echo $this->renderPartial('_form',
array('model'=>$model,'SaveUs'=>$SaveUs,'precioVentaTmp'=>$precioVentaTmp,'item'=>$item,));
}

?>