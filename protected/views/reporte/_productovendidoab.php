<?php
//echo $tipo;
set_time_limit(900);
$cn = ReporteController::conectar();
$vsql = "SELECT
p.descripcion AS Producto,
tm.descripcion AS Moneda,
p.precio_con_igv AS PrecioVentaProm,
p.precio_compra AS PrecioCompra,
SUM(DISTINCT dv.cantidad) AS VolumenVenta,
p.utilidad AS UtilidadXProducto,
((SUM(DISTINCT dv.cantidad))*p.utilidad) AS UtilidadNeta
FROM venta v
LEFT JOIN detalle_venta dv ON dv.idventa=v.idventa
LEFT JOIN producto p ON p.idproducto=dv.idproducto
LEFT JOIN tipo_moneda tm ON tm.idtipo_moneda=p.idtipo_moneda
WHERE p.precio_con_igv <>0 AND v.fecha_registro BETWEEN '$fecha1' AND '$fecha2'
GROUP BY Producto ORDER BY VolumenVenta DESC";
$qry = mysqli_query($cn, $vsql);
$campos = mysqli_num_fields($qry);
$i=0;
ob_start();
echo "<table border=\"1\" align=\"center\">";
echo "<tr bgcolor=\"#394251\">
<td align=\"center\" colspan\"6\">
<font color=\"#ffffff\"><strong>Productos mas Vendidos</strong></font>
<br>
<font color=\"#ffffff\"><strong>Del: $fecha1 - $fecha2</strong></font>
</td>";
echo "</tr>";
echo "</table><br>";
echo "<table border=\"1\" align=\"center\">";
echo "<tr bgcolor=\"#394251\">
  <td align=\"center\"><font color=\"#ffffff\"><strong>Producto</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Moneda</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>PrecioVentaProm</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>PrecioCompra</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>VolumenVenta</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>UtilidadxProducto</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>UtilidadNeta</strong></font></td>
</tr>";
while($row=mysqli_fetch_array($qry))
{
    echo "<tr>";
     for($j=0; $j<$campos; $j++) {
         echo "<td align=\"left\">".$row[$j]."</td>";
     }
     echo "</tr>";
    // $sumatotal+=$row[6] ;
}
echo "</table>";
/*
$totalsol=MyModel::getRedondear($sumatotal);
echo "<br>";
echo "<table border=\"1\" align=\"right\">";
echo "<tr>";
echo "
<td align=\"left\"></td>
<td align=\"left\"></td>
<td align=\"left\"></td>
<td align=\"left\"></td>
<td align=\"left\"></td>
<td align=\"left\"><font color=\"#394251\"><strong>Total Utilidad Neta:  </strong></font></td>
<td align=\"right\"> $totalsol </td>";
echo "</tr>";
echo "</table>";*/
$reporte = ob_get_clean();
header("Content-type: application/vnd.ms-excel; charset=iso-8859-1");
header("Content-Disposition: attachment; filename=ProductosMV-".date('d-m-Y').".xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $reporte;
?>