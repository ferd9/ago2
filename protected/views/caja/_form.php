<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'caja-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los Campos <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>



<?php
$fecha=date('Y-m-d');
$hora=date('h:i:s');
?>

<div class="inline">
        <div class="column">
		<?php echo $form->labelEx($model,'fecha_caja'); ?>
                <?php
                    $this->widget('zii.widgets.jui.CJuiDatePicker', array(
                         'model'=>$model,
                         'attribute'=>'fecha_caja',
                         'language'=>'es',
                        // additional javascript options for the date picker plugin
                        'options'=>array(
                            'showAnim'=>'fold',
                            'dateFormat'=>'yy/mm/dd',
                        ),
                        'htmlOptions'=>array(
                            'style'=>'height:20px;',
                            'value'=>$fecha,
                        ),
                    ));
                ?>
		<?php echo $form->error($model,'fecha_caja'); ?>
	</div>


	<div class="column">
		<?php echo $form->labelEx($model,'hora'); ?>
		<?php echo $form->textField($model,'hora',array('value'=>$hora)); ?>
		<?php echo $form->error($model,'hora'); ?>
	</div>

        <div class="column">
		<?php echo $form->labelEx($model,'idtipo_movimiento',array('label'=>'Tipo Movimiento')); ?>
                <?php echo $form->dropDownList($model,'idtipo_movimiento', TipoMovimiento::getTipoMovimiento()); ?>
		<?php echo $form->error($model,'idtipo_movimiento'); ?>
	</div>


</div>
<div class="clear"> </div>

<br>
	<div class="row">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>

<div class="inline">
        <div class="column">
		<?php echo $form->labelEx($model,'idtipo_moneda',array('label'=>'Moneda')); ?>
                <?php echo $form->radioButtonList($model,'idtipo_moneda', TipoMoneda::getTipoMoneda(),array('separator'=>'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;','labelOptions'=>array('style'=>'display:inline'))); ?>
		<?php echo $form->error($model,'idtipo_moneda'); ?>
	</div>


        <div class="column">
		<?php echo $form->labelEx($model,'monto'); ?>
		<?php echo $form->textField($model,'monto',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'monto'); ?>
	</div>

</div>
<div class="clear"> </div>

<br>
	<div class="row">
		<?php echo $form->labelEx($model,'almacen'); ?>
                <?php echo $form->dropDownList($model,'almacen', Almacen::getdatosalmacencombo()); ?>
		<?php echo $form->error($model,'almacen'); ?>
	</div>

	<div class="row">
		<?php /*echo $form->labelEx($model,'estado');*/ ?>
		<?php echo $form->hiddenField($model,'estado',array('size'=>1,'maxlength'=>1)); ?>
		<?php /*echo $form->error($model,'estado');*/ ?>
	</div>

	<div class="row">
		<?php /*echo $form->labelEx($model,'usuario');*/ ?>
		<?php echo $form->hiddenField($model,'usuario',array('size'=>50,'maxlength'=>50, 'value'=>Yii::app()->user->name)); ?>
		<?php /*echo $form->error($model,'usuario');*/ ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Asignar' : 'Actualizar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->