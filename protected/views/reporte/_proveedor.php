<?php
set_time_limit(900);
$cn = ReporteController::conectar();
$vsql = "SELECT
  p.nombrecompleto,
  p.direccion,
  CONCAT(p.telefono,' / ',p.celular),
  p.email,
  CONCAT(p.fax,' / ',p.anexo),
  c.ruc,
  c.nombre_contacto,
  c.descripcion_producto
FROM proveedor c
INNER JOIN persona p ON p.idpersona=c.proveedor
WHERE c.estado=1 ORDER BY p.nombrecompleto ASC";
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
  <td align=\"center\"><font color=\"#ffffff\"><strong>Numero Documento</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Nombre Contacto</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Descripcion Producto</strong></font></td>
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
header("Content-Disposition: attachment; filename=Proveedor-".date('d-m-Y').".xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $reporte;
?>