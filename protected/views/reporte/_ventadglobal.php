<?php
set_time_limit(900);
$cn = ReporteController::conectar();
$vsql = "SELECT
(CASE (SUBSTRING(fecha_venta FROM -5 FOR 2)) WHEN '01' THEN 'Enero'
WHEN '02' THEN 'Febrero'
WHEN '03' THEN 'Marzo'
WHEN '04' THEN 'Abril'
WHEN '05' THEN 'Mayo'
WHEN '06' THEN 'Junio'
WHEN '07' THEN 'Julio'
WHEN '08' THEN 'Agosto'
WHEN '09' THEN 'Septiembre'
WHEN '10' THEN 'Octubre'
WHEN '11' THEN 'Noviembre'
WHEN '12' THEN 'Diciembre'
END) AS FechaVenta,
COUNT(DISTINCT numero_documento) AS CantidadVenta,
SUM(DISTINCT importe_total) AS SumaTotal
FROM venta WHERE fecha_venta LIKE CONCAT('%','$fecha','%') GROUP BY FechaVenta ORDER BY fecha_venta ASC";
$qry = mysqli_query($cn, $vsql);
$campos = mysqli_num_fields($qry);
$i=0;
ob_start();
echo "<table border=\"1\" align=\"center\">";
echo "<tr bgcolor=\"#394251\">
<td align=\"center\" colspan\"6\">
<font color=\"#ffffff\"><strong>Extracto Global de Ventas</strong></font>
<br>
<font color=\"#ffffff\"><strong>Del: $fecha</strong></font>
</td>";
echo "</tr>";
echo "</table><br>";
echo "<table border=\"1\" align=\"center\">";
echo "<tr bgcolor=\"#394251\">
  <td align=\"center\"><font color=\"#ffffff\"><strong>Mes</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>CantidadVentas</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>SumaTotal</strong></font></td>
</tr>";
while($row=mysqli_fetch_array($qry))
{
    echo "<tr>";
     for($j=0; $j<$campos; $j++) {
         echo "<td align=\"left\">".$row[$j]."</td>";
     }
     echo "</tr>";
}
echo "</table>";
$reporte = ob_get_clean();
header("Content-type: application/vnd.ms-excel; charset=iso-8859-1");
header("Content-Disposition: attachment; filename=EGV-".date('d-m-Y').".xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $reporte;
?>