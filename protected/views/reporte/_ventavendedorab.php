<?php
//echo $tipo;
set_time_limit(900);
$fecha=date('Y-m-d');
$cn = ReporteController::conectar();
$vsql = "SELECT
p.nombrecompleto AS Cliente,
td.descripcion AS TipoDocumento,
tp.descripcion AS TipoPago,
v.numero_documento AS NumeroDocmento,
CONCAT(v.fecha_venta,' ',v.hora) FechaVenta,
(CASE v.estado_venta WHEN 'C' THEN 'Cancelado'
WHEN 'P' THEN 'Pendiente'
END) AS EstadoVenta,
v.estado_venta_pago AS DetalleEstadol,
v.usuario AS Vendedor,
v.importe_total AS Total
FROM venta v
LEFT JOIN cliente c ON c.idcliente=v.idcliente
LEFT JOIN persona p ON p.idpersona=c.cliente
LEFT JOIN tipo_documento td ON td.idtipo_documento=v.idtipo_documento
LEFT JOIN tipo_pago tp ON tp.idtipo_pago=v.idtipo_pago
WHERE v.usuario='$tipo' AND v.fecha_venta BETWEEN '$fecha1' AND '$fecha2'
ORDER BY FechaVenta DESC";
$qry = mysqli_query($cn, $vsql);
$campos = mysqli_num_fields($qry);
$i=0;
ob_start();
echo "<table border=\"1\" align=\"center\">";
echo "<tr bgcolor=\"#394251\">
<td align=\"center\" colspan\"6\">
<font color=\"#ffffff\"><strong>Ventas por Vendedor:</strong></font>
<br>
<font color=\"#ffffff\"><strong>$tipo</strong></font>
<br>
<font color=\"#ffffff\"><strong>Del: $fecha1 - $fecha2</strong></font>
</td>";
echo "</tr>";
echo "</table><br>";
echo "<table border=\"1\" align=\"center\">";
echo "<tr bgcolor=\"#394251\">
  <td align=\"center\"><font color=\"#ffffff\"><strong>Cliente</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>TipoDocumento</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>TipoPago</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>NumeroDocumento</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>FechaVenta</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>EstadoVenta</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>DetalleEstado</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Vendedor</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Total</strong></font></td>
</tr>";
while($row=mysqli_fetch_array($qry))
{
    echo "<tr>";
     for($j=0; $j<$campos; $j++) {
         echo "<td align=\"left\">".$row[$j]."</td>";
     }
     echo "</tr>";
     $sumatotal+=$row[8] ;
}
echo "</table>";

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
<td align=\"left\"></td>
<td align=\"left\"></td>
<td align=\"left\"><font color=\"#394251\"><strong>Total:  </strong></font>
</td><td align=\"right\"> $totalsol </td>";
echo "</tr>";
echo "</table>";
$reporte = ob_get_clean();
header("Content-type: application/vnd.ms-excel; charset=iso-8859-1");
header("Content-Disposition: attachment; filename=VtVendedor-".date('d-m-Y').".xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $reporte;
?>