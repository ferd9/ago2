<h1>Saldo de Caja || Fecha: <?php echo $model->fecha_caja; ?></h1>
<?php
$monto=$model->monto;
if($entrada<>'')
{
$montoto=$monto+$entrada;
$montototal=MyModel::getRedondear($montoto);
}
else
{
$montoto=$monto;
$montototal=MyModel::getRedondear($montoto);
}
if($salida<>'')
{
$abc = $montototal-$salida;
$montoabc=MyModel::getRedondear($abc);
}
else
{
$abc = $montototal;
$montoabc=MyModel::getRedondear($abc);
}
?>
<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
                array('label'=>'Monto','value'=>$montoabc),
                array('label'=>'Moneda','value'=>$model->idtipoMoneda0->descripcion),
	),
)); ?>
