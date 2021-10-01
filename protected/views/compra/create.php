<?php
$titulo="";
$item="";
switch($tipodoc)
                {
                case 'fc':
                $titulo='Factura Compra';
                $item=1;
                break;
                case 'bc':
                $titulo='Boleta Compra';
                $item=2;
                break;
                case 'oc':
                $titulo='Orden Compra';
                $item=5;
                break;
                default :
                    $titulo= "";
                }
?>
<?php
$this->breadcrumbs=array(
	'Lista de Compras'=>array('index'),
	'Crear '.$titulo,
);

$this->menu=array(
	array('label'=>'Lista de Compras', 'url'=>array('index')),
	array('label'=>'Administrar Compras', 'url'=>array('admin')),
        array('label'=>'Agregar un Proveedor', 'url'=>array('proveedor/create'),'linkOptions' => array('target'=>'_blank')),
);
?>

<h1>Crear <?php echo $titulo;?></h1>


<?php echo $this->renderPartial('_form', array('model'=>$model,'tmpcompra'=>$tmpcompra,'item'=>$item,)); ?>