<?php
//echo $tipo;
set_time_limit(900);
$fecha=date('Y-m-d');
$cn = ReporteController::conectar();
$vsql = "SELECT CONCAT(p.idproducto,' / ',p.descripcion) AS Producto,
mar.descripcion AS Marca,
mo.descripcion AS Modelo,
CONCAT(p.precio_con_igv,' ',me.descripcion) AS UltimoCosto,
IF(ap.stock<>'',ap.stock,0) AS Stock,
(p.precio_con_igv*(IF(ap.stock<>'',ap.stock,0))) AS Valorizado
FROM producto p
LEFT JOIN marca mar ON mar.idmarca=p.idmarca
LEFT JOIN modelo mo ON mo.idmodelo=p.idmodelo
LEFT JOIN tipo_moneda me ON me.idtipo_moneda=p.idtipo_moneda
LEFT JOIN almacen_producto ap ON ap.idproducto=p.idproducto
WHERE p.idcategoria=$tipo AND p.descripcion<>'NINGUNO'";
$qry = mysqli_query($cn, $vsql);
$campos = mysqli_num_fields($qry);
$i=0;
ob_start();
echo "<table border=\"1\" align=\"center\">";
echo "<tr bgcolor=\"#394251\">
<td align=\"center\" colspan\"6\">
<font color=\"#ffffff\"><strong>Listado Valorizado de Stock (Ultimo Costo)</strong></font>
<br>
<font color=\"#ffffff\"><strong>$fecha</strong></font>
</td>";
echo "</tr>";
echo "</table><br>";
echo "<table border=\"1\" align=\"center\">";
echo "<tr bgcolor=\"#394251\">
  <td align=\"center\"><font color=\"#ffffff\"><strong>Producto</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Marca</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Modelo</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Ultimo Costo</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Stock Actual</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Valorizado</strong></font></td>
</tr>";
while($row=mysqli_fetch_array($qry))
{
    echo "<tr>";
     for($j=0; $j<$campos; $j++) {
         echo "<td align=\"left\">".$row[$j]."</td>";
     }
     echo "</tr>";
     $sumatotal+=$row[5] ;
}
echo "</table>";

$totals=$sumatotal*$tipocambiomoneda;
$totalsol=MyModel::getRedondear($totals);
echo "<br>";
echo "<table border=\"1\" align=\"right\">";
echo "<tr>";
echo "<td align=\"left\"><font color=\"#394251\"><strong>Tipo de Cambio:  </strong></font></td><td align=\"right\"> $tipocambiomoneda </td>";

echo"</tr>";
echo "<tr>";
echo "<td align=\"left\"><font color=\"#394251\"><strong>Total General: $moneda2  </strong></font></td><td align=\"right\"> $totalsol </td>";
echo"</tr>";

echo"</tr>";
echo "<tr>";
echo "<td align=\"left\"><font color=\"#394251\"><strong>Total General: $moneda1 </strong></font></td><td align=\"right\"> $sumatotal </td>";
echo"</tr>";
echo "</table>";
$reporte = ob_get_clean();
header("Content-type: application/vnd.ms-excel; charset=iso-8859-1");
header("Content-Disposition: attachment; filename=ValMer-".date('d-m-Y').".xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $reporte;
?>
