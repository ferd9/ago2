<?php
set_time_limit(900);
//echo "<br>".$tipo;
//echo "<br>".$fecha1;
//echo "<br>".$fecha2;
/*$dataProvider= MyModel::attributeNames();
//print_r($dataProvider);
$data = array(
    1 => array ('Name', 'Surname'),
    $dataProvider, $dataProvider
);


Yii::import('application.extensions.phpexcel.JPhpExcel');
$xls = new JPhpExcel('UTF-8', false, 'prueba1');
$xls->addArray($data);
$xls->generateXML('prueba1');
*/

$cn = ReporteController::conectar();
/*
$vsql = "call sp_reporte_GT (";
$vsql = $vsql . " '". $gtc ."',";
$vsql = $vsql . " '". $cartera ."',";
$vsql = $vsql . " '". $usera ."',";
$vsql = $vsql . " '". $txtfecha1 ."',";
$vsql = $vsql . " '". $txtfecha2 ."'";
$vsql = $vsql . " )";
*/
$vsql = "SELECT c.fecha_caja,c.hora,c.descripcion,m.descripcion,c.monto,mn.descripcion,a.nombre,c.usuario
FROM caja c
LEFT JOIN tipo_movimiento m ON m.idtipo_movimiento=c.idtipo_movimiento
LEFT JOIN tipo_moneda mn ON mn.idtipo_moneda=c.idtipo_moneda
LEFT JOIN almacen a ON a.idalmacen=c.almacen
WHERE  c.fecha_caja BETWEEN '$fecha1' AND '$fecha2'";
$qry = mysqli_query($cn, $vsql);
$campos = mysqli_num_fields($qry);
$i=0;
ob_start();
echo "<table border=\"1\" align=\"center\">";
echo "<tr bgcolor=\"#394251\">
  <td align=\"center\"><font color=\"#ffffff\"><strong>Fecha</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Hora</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Descripcion</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>TipoMovimiento</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Monto</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Moneda</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Almacen</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Usuario</strong></font></td>
</tr>";
while($row=mysqli_fetch_array($qry))
{
    echo "<tr>";
     for($j=0; $j<$campos; $j++) {
         echo "<td align=\"center\">".$row[$j]."</td>";
     }
     echo "</tr>";
}
echo "</table>";
$reporte = ob_get_clean();
header("Content-type: application/vnd.ms-excel; charset=iso-8859-1");
header("Content-Disposition: attachment; filename=MC-".date('d-m-Y').".xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $reporte; 
?>