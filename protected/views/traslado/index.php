<?php
$this->breadcrumbs=array(
	'Traslado Producto Almacen',
);
?>
<h2>Traslado Producto Almacen</h2>
    <br>


<div class="form">

<?php
$url=Yii::app()->request->baseUrl;
echo CHtml::beginForm(''.$url.'?r=traslado/datatraslado','GET',
array('id'=>'traslado','name'=>'traslado')); ?>

<?php
//,'target'=>'_blank'
$fecha=date('Y-m-d');
$hora=date('h:i:s');
?>


    <div class="row">
<?php echo "<strong>Lugar de Origen Usuario: </strong>     ".$nomalmacen.""; ?>
  <?php echo CHtml::hiddenField('idalmacen',$idalmacen);?>
</div>
    <br>
        <div class="row">
<?php echo "<strong>Almacen de Origen: </strong>"; ?>
  <?php echo CHtml::dropDownList('tipoa','rga',  Almacen::getdatosalmacencombo(), array('options' => array($idalmacen=>array('selected'=>true)))); ?>
</div>
    <br>
       
	<div class="row buttons">
		<?php echo CHtml::submitButton('Siguiente'); ?>
	</div>
<?php echo CHtml::endForm(); ?>

</div><!-- form -->