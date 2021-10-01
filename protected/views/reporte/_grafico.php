    <h2>Grafico Ventas</h2>
<div class="form">

<?php
$url=Yii::app()->request->baseUrl;
echo CHtml::beginForm(''.$url.'?r=reporte/grafico2','GET',
array('id'=>'reporte','name'=>'reporte')); ?>

<div class="row">
<?php echo "<strong>Seleccione un año:</strong><br>"; ?>
<?php echo CHtml::dropDownList('fecha','fecha',ReporteController::generaranios()); ?>
</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Visualizar'); ?>
	</div>
<?php echo CHtml::endForm(); ?>

</div><!-- form -->