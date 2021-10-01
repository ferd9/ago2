<?php
set_time_limit(900);
$cn = ReporteController::conectar();
$vsql = "SELECT
p.idproducto AS Codigo,
cat.descripcion AS Categoria,
mar.descripcion AS Marca,
mo.descripcion AS Modelo,
p.descripcion AS Producto,
tm.descripcion AS Moneda,
p.precio_compra AS PrecioCompra,
p.utilidad AS Utilidad,
p.precio_con_igv AS PrecioVenta
FROM producto p
LEFT JOIN categoria cat ON cat.idcategoria=p.idcategoria
LEFT JOIN marca mar ON mar.idmarca=p.idmarca
LEFT JOIN modelo mo ON mo.idmodelo=p.idmodelo
LEFT JOIN tipo_moneda tm ON tm.idtipo_moneda=p.idtipo_moneda
WHERE p.descripcion<>'NINGUNO'
GROUP BY p.descripcion ORDER BY cat.descripcion ASC";
$qry = mysqli_query($cn, $vsql);
$campos = mysqli_num_fields($qry);
$i=0;
ob_start();
echo "<table border=\"1\" align=\"center\">";
echo "<tr bgcolor=\"#394251\">
  <td align=\"center\"><font color=\"#ffffff\"><strong>Codigo</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Categoria</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Marca</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Modelo</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Producto</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Moneda</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Precio Compra</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Utilidad %</strong></font></td>
  <td align=\"center\"><font color=\"#ffffff\"><strong>Precio Venta</strong></font></td>
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
header("Content-Disposition: attachment; filename=PCV-".date('d-m-Y').".xls");
header("Pragma: no-cache");
header("Expires: 0");
echo $reporte;
?>