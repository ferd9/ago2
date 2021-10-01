<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" lang="es">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" /><meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
	<link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/css/favicon.ico" type="image/x-icon" />
		<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
        
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

        <link rel="stylesheet" media="all" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/pro_left_right.css" />

<!--[if lte IE 6]>
<link rel="stylesheet" media="all" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/pro_left_right_ie6.css" />
<![endif]-->


</head>

<body>

<div id="pro_linedrop">
<ul class="select">
<li class="lrt"><a href="index.php"><b>Inicio</b></a></li>
<?php
$nivelll=Yii::app()->user->getId();
if($nivelll==1 || $nivelll==2){
?>
<li class="line lrt"><a href=""><b class="arrow">Almacen</b><!--[if IE 7]><!--></a><!--<![endif]-->
<!--[if lte IE 6]><table><tr><td><![endif]-->

<ul class='sub rt'>
<?php
 $nivelll=Yii::app()->user->getId();
 if($nivelll==1){
?>
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=almacen
" target="_top">Almacen</a>
</li>
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=traslado
" target="_top">Traslado entre Almacen</a>
</li>
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=traslado/admin
" target="_top">Lista Traslado entre Almacen</a>
</li>
<?php
}
else
{}
?>
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=producto
" target="_top">Producto</a>
</li>
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=productoProveedor/admin
" target="_top">Producto-Proveedor</a>
</li>
</ul>
<!--[if lte IE 6]></td></tr></table></a><![endif]-->
</li>
 <?php
 }
 else
 {}
?>


<?php
 $nivelll=Yii::app()->user->getId();
 if($nivelll==1 || $nivelll==2){
?>
<li class="line lrt"><a href=""><b class="arrow">Compra</b><!--[if IE 7]><!--></a><!--<![endif]-->
<!--[if lte IE 6]><table><tr><td><![endif]-->

<ul class='sub rt'>

<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=compra
" target="_top">Control de Compras</a>
</li>

<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=compra/create&t=fc
" target="_top">Factura Compra</a>
</li>

<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=compra/create&t=bc
" target="_top">Boleta Compra</a>
</li>

<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=compra/create&t=oc
" target="_top">Orden Compra</a>
</li>

<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=guiaRemisionCompra/create
" target="_top">Guia Remision Compra</a>
</li>
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=proveedor
" target="_top">Control de Proveedores</a>
</li>
<?php /*
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=productoProveedor
" target="_top">Proveedor -> Producto</a>
</li>
*/?>
</ul>
<!--[if lte IE 6]></td></tr></table></a><![endif]-->
</li>

  <?php
 }
 else
 {}
?>


<?php
 $nivelll=Yii::app()->user->getId();
 if($nivelll==1 || $nivelll==2){
?>
<li class="line lrt"><a href=""><b class="arrow">Venta</b><!--[if IE 7]><!--></a><!--<![endif]-->
<!--[if lte IE 6]><table><tr><td><![endif]-->

<ul class='sub rt'>

<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=venta
" target="_top">Control de Ventas</a>
</li>

<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=venta/create&t=fv
" target="_top">Factura Venta</a>
</li>

<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=venta/adminFacturaVenta
" target="_top">Lista de Factura Venta</a>
</li>

<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=venta/create&t=bv
" target="_top">Boleta Venta</a>
</li>

<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=venta/adminBoletaVenta
" target="_top">Lista de Boleta Venta</a>
</li>

<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=venta/create&t=nv
" target="_top">Nota Venta</a>
</li>

<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=venta/adminNotaVenta
" target="_top">Lista de Nota Venta</a>
</li>

<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=venta/create&t=cv
" target="_top">Cotizacion</a>
</li>

<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=venta/adminCotizacionVenta
" target="_top">Lista de Cotizacion</a>
</li>

<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=guiaRemisionVenta/create
" target="_top">Guia Remision Venta</a>
</li>

<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=cliente
" target="_top">Control de Clientes</a>
</li>

</ul>
<!--[if lte IE 6]></td></tr></table></a><![endif]-->
</li>
  <?php
 }
 else
 {}
?>

<?php
 $nivelll=Yii::app()->user->getId();
 if($nivelll==1 || $nivelll==3){
?>
<li class="line lrt"><a href=""><b class="arrow">Soporte</b><!--[if IE 7]><!--></a><!--<![endif]-->
<!--[if lte IE 6]><table><tr><td><![endif]-->

<ul class='sub rt'>

<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=soporte
" target="_top">Control de Soporte Tecnico</a>
</li>
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=servicio
" target="_top">Control de Servicios</a>
</li>

</ul>
<!--[if lte IE 6]></td></tr></table></a><![endif]-->
</li>
   <?php
 }
 else
 {}
?>


<?php
 $nivelll=Yii::app()->user->getId();
 if($nivelll==1 || $nivelll==2){
?>

<li class="line lrt"><a href=""><b class="arrow">Caja</b><!--[if IE 7]><!--></a><!--<![endif]-->
<!--[if lte IE 6]><table><tr><td><![endif]-->

<ul class='sub rt'>


<?php
$fechactual=date('Y-m-d');
$estadocaja=CajaController::getEstadoActi($fechactual);

if($estadocaja==0)
{
?>
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>/index.php?r=caja/activarcaja" target="_top">Activar Caja - <?php echo $fechactual;?></a>
</li>
<?php
}
?>

<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=caja/create
" target="_top">Movimiento de Caja <?php echo $fechactual;?></a>
</li>

<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=caja/saldo
" target="_top">Saldo de Caja a la Fecha: <?php echo $fechactual;?></a>
</li>

</ul>
<!--[if lte IE 6]></td></tr></table></a><![endif]-->
</li>
 <?php
 }
 else
 {}
?>

<?php
 $nivelll=Yii::app()->user->getId();
 if($nivelll==1){
?>

<li class="line lrt"><a href=""><b class="arrow">Gerencia</b><!--[if IE 7]><!--></a><!--<![endif]-->
<!--[if lte IE 6]><table><tr><td><![endif]-->

<ul class='sub rt'>

<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=reporte/trabajador
" target="_top">Lista Trabajadores</a>
</li>
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=reporte/cliente
" target="_top">Lista Clientes Activos</a>
</li>
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=reporte/proveedor
" target="_top">Lista Proveedores Activos</a>
</li>
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=reporte
" target="_top">Lista Movimiento Caja</a>
</li>
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=reporte/mercaderia
" target="_top">Lista Valorizado de Mercaderia</a>
</li>
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=reporte/merstockalma
" target="_top">Lista Valorizado de Stock por Almacen</a>
</li>
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=reporte/ventaproducto
" target="_top">Ventas de un Producto</a>
</li>

<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=reporte/ventavendedor
" target="_top">Ventas por Vendedor</a>
</li>

<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=reporte/productovendido
" target="_top">Productos mas Vendidos</a>
</li>

<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=reporte/precioscompraventa
" target="_top">Precios de Compra y Venta</a>
</li>

<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=reporte/rankingcompradores
" target="_top">Ranking Mayores Compradores</a>
</li>

<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=reporte/rankingvendedores
" target="_top">Ranking Mayores Vendedores</a>
</li>

<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=reporte/ventadglobal
" target="_top">Extracto Global de Ventas</a>
</li>

<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=reporte/grafico
" target="_top">Grafico Estadistico de Ventas</a>
</li>

</ul>
<!--[if lte IE 6]></td></tr></table></a><![endif]-->
</li>
 <?php
 }
 else
 {}
?>




<li class="line lrt"><a href=""><b class="arrow">Sistema</b><!--[if IE 7]><!--></a><!--<![endif]-->
<!--[if lte IE 6]><table><tr><td><![endif]-->
<ul class="sub rt">

<?php
 $nivelll=Yii::app()->user->getId();
 if($nivelll==1){
?>

<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=usuario
" target="_top">Control de Usuarios</a>
</li>

<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=empresa
" target="_top">Control de Empresa</a>
</li>

<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=tipoMoneda
" target="_top">Control de Moneda</a>
</li>

<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=igv/view&id=1
" target="_top">Control del IGV</a>
</li>

<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=sistema/import
" target="_top">Importación/Exportación de Excel-BD</a>
</li>

<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=sistema/backup
" target="_top">Efectuar/Restaurar Copia Seguridad</a>
</li>
<?php
 }
 else
 {}
?>
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=site/contact
" target="_top">Contactar a Soporte</a>
</li>
<li><a href="<?php echo Yii::app()->request->baseUrl; ?>?r=site/page&view=about" target="_top">Acerca de ...<?php echo Yii::app()->name;?></a>
</li>
</ul>
<!--[if lte IE 6]></td></tr></table></a><![endif]-->
</li>

<li class="line lrt">
<?php
if(Yii::app()->user->isGuest)
{
}
else
{
$this->widget('zii.widgets.CMenu',array(
'id'=>'pro_linedrop',
'items'=>array(
array('label'=>'Ingresar', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
array('label'=>'Salir ('.Yii::app()->user->name.')...  ', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
),
));
}
?>

</li>
</ul>
</div>
<?php
if(Yii::app()->user->isGuest)
{}
else
{
?>
<center>
    <?php $this->beginWidget('zii.widgets.CPortlet'); ?>

    <?php   $fechactual=date('Y-m-d');
            $estadocaja=CajaController::getEstadoActi($fechactual);
            $horacaja=CajaController::getHoraActi($fechactual);
            $usercaja=CajaController::getUserActi($fechactual);
            if($estadocaja==0)
            {
               echo "<h6><strong>Caja Desactivada, Porfavor Activarla.. </strong></h6>";
            }
            else
            {
                echo "<h6><strong>Caja Activada:  [$fechactual - $horacaja] - Por: [$usercaja]</strong></h6>";
            }
    ?>
<?php $this->endWidget(); ?>
</center>
<?php
}
?>

<div id="content">
<?php
$this->widget('zii.widgets.CBreadcrumbs', array(
		'links'=>$this->breadcrumbs,
	));
?><!-- breadcrumbs -->

<?php echo $content; ?>

</div>
<div id="footer">
Copyright &copy; <?php echo date('Y'); ?> por 3l@Pr3nd1z:Fernando Perez.<br/>
Todos los derechos reservados.<br/>
</div><!-- footer -->
</body>
</html>