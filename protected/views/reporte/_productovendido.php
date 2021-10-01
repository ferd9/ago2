<h2>Productos mas Vendidos</h2>
<div class="form">

<?php
$url=Yii::app()->request->baseUrl;
echo CHtml::beginForm(''.$url.'?r=reporte/reportproductovendido','GET',
array('id'=>'reporte','name'=>'reporte','target'=>'_blank')); ?>

        <div class="row">
		Del: &nbsp;&nbsp;&nbsp;&nbsp;
<?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
              'name'=>'fecha1',
              'id'=>'fecha1',
              'language'=>'es',
                        // additional javascript options for the date picker plugin
              'options'=>array(
              'showAnim'=>'fold',
              'dateFormat'=>'yy/mm/dd',
               ),
               'htmlOptions'=>array(
               'style'=>'height:20px;',
               'size'=>'10',
               ),
               ));
?>
 &nbsp; &nbsp; Hasta:
 <?php
$this->widget('zii.widgets.jui.CJuiDatePicker', array(
              'name'=>'fecha2',
              'id'=>'fecha2',
              'language'=>'es',
                        // additional javascript options for the date picker plugin
              'options'=>array(
              'showAnim'=>'fold',
              'dateFormat'=>'yy/mm/dd',
               ),
               'htmlOptions'=>array(
               'style'=>'height:20px;',
               'size'=>'10',
               ),
               ));
?>
	</div>


	<div class="row buttons">
		<?php echo CHtml::submitButton('Exportar'); ?>
	</div>
<?php echo CHtml::endForm(); ?>

</div><!-- form -->