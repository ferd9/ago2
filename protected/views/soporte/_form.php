<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'soporte-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los Campos <span class="required">*</span> son requeridos.</p>
<?php
$fecha=date('Y-m-d');
$hora=date('h:i:s');
?>
       
	<?php echo $form->errorSummary($model); ?>

        <div class="row">
           <?php echo $form->labelEx($model,'idcliente',array('label'=>'Nombre del Cliente')); ?>
            <?php
            $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                'model'=>$model,
                'attribute'=>'idcliente',
                'source'=>  Cliente::getListClientes(),
                'options'=>array(
                    'minLength'=>'2',
                ),
                'htmlOptions'=>array(
                    'style'=>'height:20px;',
                    'size'=>'80px'
                ),
            ));
            ?>
		<?php echo $form->error($model,'idcliente'); ?>
</div>

<div class="inline">

    <div class="column">
		<?php echo $form->labelEx($model,'estado_producto'); ?>
		<?php echo $form->textField($model,'estado_producto',array('size'=>50,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'estado_producto'); ?>
	</div>

        <div class="column">

                <?php echo $form->labelEx($model,'tipo_atencion'); ?>
		<?php echo $form->radioButtonList($model,'tipo_atencion',Soporte::getAtencion(),array('separator'=>'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;','labelOptions'=>array('style'=>'display:inline')))?>
	</div>


        
</div>
<div class="clear"> </div>
 

<div class="inline">
     <div class="column">
	<?php echo $form->errorSummary($venta); ?>

           <?php echo $form->labelEx($garantia,'idventa',array('label'=>'Numero Documento Venta')); ?>
           <?php echo CHtml::activeTextField($garantia,'idventa',array('size'=>30,'maxlength'=>50)); ?>
	   <?php echo $form->error($garantia,'idventa'); ?>

</div>

     <div class="column">
		<?php echo $form->labelEx($model,'fecha_ingreso_soporte',array('label'=>'Fecha Ingreso Producto')); ?>
                <?php
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                         'model'=>$model,
                         'attribute'=>'fecha_ingreso_soporte',
                         'language'=>'es',
                        'options'=>array(
                            'showAnim'=>'fold',
                            'dateFormat'=>'yy-mm-dd',
                        ),
                        'htmlOptions'=>array(
                            'style'=>'height:16px;',
                            'value'=>$fecha,
                            'size'=>'10px'
                        ),
                    ));
                ?>
		<?php echo $form->error($model,'fecha_ingreso_soporte'); ?>

</div>

     <div class="column">

		<?php echo $form->labelEx($model,'fecha_salida_producto',array('label'=>'Fecha Salida Producto')); ?>
                <?php
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                         'model'=>$model,
                         'attribute'=>'fecha_salida_producto',
                         'language'=>'es',
                        // additional javascript options for the date picker plugin
                        'options'=>array(
                            'showAnim'=>'fold',
                            'dateFormat'=>'yy-mm-dd',
                        ),
                        'htmlOptions'=>array(
                            'style'=>'height:16px;',
                            'size'=>'10px'
                        ),
                    ));
                ?>
		<?php echo $form->error($model,'fecha_salida_producto'); ?>
	</div>
</div>
 <div class="clear"> </div>
<div class="row">
		<?php echo "Numero de Venta Opcional en Servicio"; ?>

	</div>

 <br>
	


	<div class="row">
		<?php /*echo $form->labelEx($model,'usuario');*/ ?>
		<?php echo $form->hiddenField($model,'usuario',array('size'=>15,'maxlength'=>15,'value'=>Yii::app()->user->name)); ?>
		<?php /*echo $form->error($model,'usuario'); */?>
	</div>

	<div class="row">
		<?php /*echo $form->labelEx($model,'estado'); */?>
		<?php echo $form->hiddenField($model,'estado',array('size'=>1,'maxlength'=>1)); ?>
		<?php /*echo $form->error($model,'estado'); */?>
	</div>

<?php
$url=Yii::app()->request->baseUrl;
echo CHtml::button('Agregar Nuevo Accesorio', array(
        'name'=>'Agregar Nuevo Accesorio',
        'onclick'=>"window.open ('?r=accesoriosSoporte/create', 'nom_interne_de_la_fenetre', config='height=350, width=500, toolbar=no, menubar=no, scrollbars=no, resizable=no, location=no, directories=no, status=no')"
));

 ?>



 <br>

<script type="text/javascript">
function refreshList()
{
$.fn.yiiGridView.update("accesorios-soporte-grid");
}
var interval = setInterval("refreshList()", 6000);
</script>
<p class="note">Porfavor espere los accesorios estan cargando...</p>
<div class="row">

<?php
$this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'accesorios-soporte-grid',
	'dataProvider'=>$accesoriosSoporte->search2(),
	'columns'=>array(
                array(
                'name'=>'cantidad_soporte',
                'header'=>'Cantidad',
                'value'=>'$data->cantidad_soporte'),
                array(
                'name'=>'descripcion_soporte',
                'header'=>'Descripcion',
                'value'=>'$data->descripcion_soporte'),
                array(
                'name'=>'serie_soporte',
                'header'=>'Serie',
                'value'=>'$data->serie_soporte'),
		array(
                'name'=>'codigobarras_soporte',
                'header'=>'CodigoBarra',
                'value'=>'$data->codigobarras_soporte'),
		array(
			'class'=>'CButtonColumn',
                        'header'=>'Quitar',
                        'deleteButtonUrl' => 'Yii::app()->createUrl("accesoriosSoporte/delete",array("id"=>$data["idacce_soporte"]))',
                        'template'=>'{delete}',

		),
            
	),
)); ?>
</div>
        <br>

<div class="row">
		<?php echo $form->labelEx($model,'observaciones',array('label'=>'Observaciones de Soporte')); ?>
		<?php echo $form->textArea($model,'observaciones',array('rows'=>1, 'cols'=>85)); ?>
		<?php echo $form->error($model,'observaciones'); ?>
	</div>

	<div class="row buttons">

		<?php echo CHtml::submitButton($model->isNewRecord ? 'Grabar' : 'Actualizar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->