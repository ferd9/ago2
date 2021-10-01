<?php
set_time_limit(900);
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
$vsql = "SELECT
  p.nombrecompleto,
  p.direccion,
  CONCAT(p.telefono,' / ',p.celular),
  p.email,
  CONCAT(p.fax,' / ',p.anexo),
  tc.descripcion,
  c.numero_documento,
  c.puntos
FROM cliente c
INNER JOIN persona p ON p.idpersona=c.cliente
INNER JOIN tipo_cliente tc ON tc.idtipo_cliente=c.idtipo_cliente
WHERE estado=1 ORDER BY p.nombrecompleto ASC";
$qry = mysqli_query($cn, $vsql);
$campos = mysqli_num_fields($qry);
$i=0;
ob_start();
echo "<table border=\"1\" align=\"center\">";
echo "<tr bgcolor=\"#394251\">
  <td align=\"center\"><font color=\"#ffffff\"><strong>Nombre</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Direccion</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Telefono/Celular</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Email</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Fax/Anexo</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Tipo Cliente</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Numero Documento</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Puntos</strong></font></td>
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
header("Content-Disposition: attachment; filename=Clientes-".date('d-m-Y').".xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $reporte;
?>