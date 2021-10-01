<h2>Ventas de un Producto</h2>
<div class="form">

<?php
$url=Yii::app()->request->baseUrl;
echo CHtml::beginForm(''.$url.'?r=reporte/reportVentaproducto','GET',
array('id'=>'reporte','name'=>'reporte','target'=>'_blank')); ?>

<?php
$fecha=date('Y-m-d');
$hora=date('h:i:s');
?>


<div class="row">
<?php echo "<strong>Seleccione Producto:</strong><br>"; ?>
<?php
//echo CHtml::dropDownList('tipo','rg',Producto::getdatosproductocombo(),array('style'=>"width:500px"));
$this->widget('zii.widgets.jui.CJuiAutoComplete',
array('name'=>'tipo',
    'attribute'=>'tipo',
    'source'=>Producto::getListproductos(),
    'options'=>array('minLength'=>'2',),
    'htmlOptions'=>array( 'style'=>'height:20px;','size'=>'80px'),));
?>
</div>



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