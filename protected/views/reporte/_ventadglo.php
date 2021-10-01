    <h2>Extracto Global Ventas</h2>
<div class="form">

<?php
$url=Yii::app()->request->baseUrl;
echo CHtml::beginForm(''.$url.'?r=reporte/ventadglobalab','GET',
array('id'=>'reporte','name'=>'reporte')); ?>

<div class="row">
<?php echo "<strong>Seleccione un año:</strong><br>"; ?>
<?php echo CHtml::dropDownList('fecha','fecha',ReporteController::generaranios()); ?>
</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Exportar'); ?>
	</div>
<?php echo CHtml::endForm(); ?>

</div><!-- form -->