<?php
$this->breadcrumbs=array(
	'Inicio Traslado Producto Almacen'=>array('index'),
	'Ejecutar Traslado Producto Almacen',
);
?>
<h2>Traslado Producto Almacen</h2>
    <br>


<div class="form">

<?php
$url=Yii::app()->request->baseUrl;
echo CHtml::beginForm(''.$url.'?r=traslado/grabatraslado','GET',
array('id'=>'trasladoab','name'=>'trasladoab')); ?>

<?php
//,'target'=>'_blank'
$fecha=date('Y-m-d');
$hora=date('h:i:s');
?>


    <div class="row">
<?php echo "<strong>Almacen Origen Seleccionado: </strong>     ".$nombrealmcen2.""; ?>
  <?php echo CHtml::hiddenField('idalmacen',$tipo);?>
</div>
    <br>
        <div class="row">
<?php echo "<strong>Almacen de Destino: </strong>"; ?>

<?php
$cat = new CDbCriteria;
$cat->condition = "idalmacen<>$tipo";
$listCat =CHtml::listData(Almacen::model()->findAll($cat),'idalmacen','nombre');
?>
<?php echo CHtml::dropDownList('tipob','idalmacen',$listCat); ?>
</div>
  <?php
$url=Yii::app()->request->baseUrl;
echo CHtml::button('Agregar Producto', array(
        'name'=>'Agregar Producto',
        'onclick'=>"window.open ('?r=tmptrans/admin', 'atrasla', config='height=400, width=800, toolbar=no, menubar=no, scrollbars=yes, resizable=no, location=no, directories=no, status=no')"
));

 ?>

<script type="text/javascript">
function refreshList()
{
$.fn.yiiGridView.update("tmptrans-save-grid");
}
var interval = setInterval("refreshList()", 6000);
</script>
<p class="note">Porfavor espere los productos estan cargando...</p>

<?php $this->renderPartial('/tmptransSave/admin',array(
	'model'=>$tmptransSave,
)); ?>
<br>
<div class="row">
<?php echo "<strong>Motivo de Traslado: </strong><br>"; ?>
<?php echo CHtml::textArea('observaciones','',array('rows'=>1, 'cols'=>85)); ?>
</div>
<br>
	<div class="row buttons">
		<?php echo CHtml::submitButton('Trasladar'); ?>
	</div>
<?php echo CHtml::endForm(); ?>

</div><!-- form -->