<?php
//echo $tipo;
set_time_limit(900);
$fecha=date('Y-m-d');
$cn = ReporteController::conectar();
$vsql = "SELECT
v.fecha_venta AS Fecha,
td.descripcion AS TipoDocumento,
v.numero_documento AS NumeroDocumento,
dv.cantidad AS Cantidad,
tm.descripcion,
dv.precio_venta_unitario AS PrecioVenta,
dv.precio_venta_lote AS PrecioT
FROM venta v
LEFT JOIN tipo_documento td ON td.idtipo_documento=v.idtipo_documento
LEFT JOIN detalle_venta dv ON dv.idventa=v.idventa
LEFT JOIN producto p ON p.idproducto=dv.idproducto
LEFT JOIN tipo_moneda tm ON tm.idtipo_moneda=p.idtipo_moneda
WHERE dv.idproducto=$idproducto AND v.fecha_venta BETWEEN '$fecha1' AND '$fecha2' order by v.fecha_venta desc";
$qry = mysqli_query($cn, $vsql);
$campos = mysqli_num_fields($qry);
$i=0;
ob_start();
echo "<table border=\"1\" align=\"center\">";
echo "<tr bgcolor=\"#394251\">
<td align=\"center\" colspan\"6\">
<font color=\"#ffffff\"><strong>Ventas del Producto</strong></font>
<br>
<font color=\"#ffffff\"><strong>$idproducto - $tipo</strong></font>
<br>
<font color=\"#ffffff\"><strong>Del: $fecha1 - $fecha2</strong></font>
</td>";
echo "</tr>";
echo "</table><br>";
echo "<table border=\"1\" align=\"center\">";
echo "<tr bgcolor=\"#394251\">
  <td align=\"center\"><font color=\"#ffffff\"><strong>Fecha</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>TipoDocumento</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>NumeroDocumento</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Cantidad</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Moneda</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>PrecioVenta</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>PrecioT.</strong></font></td>
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

$totalsol=MyModel::getRedondear($sumatotal);
echo "<br>";
echo "<table border=\"1\" align=\"right\">";
echo "<tr>";
echo "<td align=\"left\"></td><td align=\"left\"></td><td align=\"left\"></td><td align=\"left\"></td><td align=\"left\"></td><td align=\"left\"><font color=\"#394251\"><strong>Total:  </strong></font></td><td align=\"right\"> $totalsol </td>";
echo "</tr>";
echo "</table>";
$reporte = ob_get_clean();
header("Content-type: application/vnd.ms-excel; charset=iso-8859-1");
header("Content-Disposition: attachment; filename=VtProducto-".date('d-m-Y').".xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $reporte;
?>
