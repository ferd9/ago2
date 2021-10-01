<?php
set_time_limit(900);
$fecha=date('Y-m-d');
$cn = ReporteController::conectar();
if($fecha1<>'' && $fecha2<>'')
{
$vsql = "SELECT
u.numero_documento AS NroDoc,
TRIM(v.usuario) AS Usuario,
TRIM(p.nombrecompleto) AS Nombre,
COUNT(v.idventa) AS Cantidad,
SUM(DISTINCT v.importe_total) AS Total
FROM venta v
LEFT JOIN usuario u ON u.login=v.usuario
LEFT JOIN persona p ON p.idpersona=u.usuario
WHERE v.fecha_venta<>'' AND v.fecha_venta BETWEEN '$fecha1' AND '$fecha2'
GROUP BY v.usuario HAVING Cantidad>=1 ORDER BY Cantidad DESC";
}
else
{
$vsql = "SELECT
u.numero_documento AS NroDoc,
TRIM(v.usuario) AS Usuario,
TRIM(p.nombrecompleto) AS Nombre,
COUNT(v.idventa) AS Cantidad,
SUM(DISTINCT v.importe_total) AS Total
FROM venta v
LEFT JOIN usuario u ON u.login=v.usuario
LEFT JOIN persona p ON p.idpersona=u.usuario
WHERE v.fecha_venta<>''
GROUP BY v.usuario HAVING Cantidad>=1 ORDER BY Cantidad DESC";
}

$qry = mysqli_query($cn, $vsql);
$campos = mysqli_num_fields($qry);
$i=0;
ob_start();
echo "<table border=\"1\" align=\"center\">";
echo "<tr bgcolor=\"#394251\">
<td align=\"center\" colspan\"6\">
<font color=\"#ffffff\"><strong>Ranking Mayores Vendedores</strong></font>
<br>";
if($fecha1<>'' && $fecha2<>'')
{
echo "<font color=\"#ffffff\"><strong>Del: $fecha1 - Al: $fecha2</strong></font>";
}
else
{}
echo "</td>";
echo "</tr>";
echo "</table><br>";
echo "<table border=\"1\" align=\"center\">";
echo "<tr bgcolor=\"#394251\">
  <td align=\"center\"><font color=\"#ffffff\"><strong>NroDocumento</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Usuario</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Nombre</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Cantidad</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Total</strong></font></td>
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
header("Content-Disposition: attachment; filename=RMV-".date('d-m-Y').".xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $reporte;
?>