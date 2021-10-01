    <h2>Valorizacion de Mercaderia</h2>
<div class="form">

<?php
$url=Yii::app()->request->baseUrl;
echo CHtml::beginForm(''.$url.'?r=reporte/reportmerca','GET',
array('id'=>'reporte','name'=>'reporte','target'=>'_blank')); ?>

<?php
$fecha=date('Y-m-d');
$hora=date('h:i:s');
?>


<div class="row">
<?php echo "<strong>Categoria de Producto:</strong><br>"; ?>
<?php echo CHtml::dropDownList('tipo','rg',  MyModel::getCategoria()); ?>
</div>
    <br>
     


	<div class="row buttons">
		<?php echo CHtml::submitButton('Exportar'); ?>
	</div>
<?php echo CHtml::endForm(); ?>

</div><!-- form -->