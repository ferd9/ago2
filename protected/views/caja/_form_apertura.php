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
                <?php echo $form->hiddenField($model,'fecha_caja',array('value'=>$fecha)); ?>
		<?php echo $form->hiddenField($model,'hora',array('value'=>$hora)); ?>
                <?php echo $form->hiddenField($model,'idtipo_movimiento' ,array('value'=>3)); ?>
                <?php echo $form->hiddenField($model,'descripcion',array('size'=>60,'maxlength'=>200,'value'=>'Apertura Caja - '.$fecha.' || '.$hora)); ?>
                <?php echo $form->hiddenField($model,'almacen',array('value'=>(int)MyModel::getIdAlmacen())); ?>
                <?php echo $form->hiddenField($model,'estado',array('size'=>1,'maxlength'=>1)); ?>
                <?php echo $form->hiddenField($model,'usuario',array('size'=>50,'maxlength'=>50, 'value'=>Yii::app()->user->name)); ?>
        </div>


</div>
<div class="clear"> </div>

<br>

<div class="inline">
        <div class="column">
		<?php echo $form->labelEx($model,'idtipo_moneda',array('label'=>'Moneda')); ?>
                <?php echo $form->radioButtonList($model,'idtipo_moneda', TipoMoneda::getTipoMoneda(),array('separator'=>'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;','labelOptions'=>array('style'=>'display:inline'))); ?>
		<?php echo $form->error($model,'idtipo_moneda'); ?>
	</div>


        <div class="column">
		<?php echo $form->labelEx($model,'monto'); ?>
		<?php echo CHtml::activeTextField($model,'monto',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'monto'); ?>
	</div>

</div>
<div class="clear"> </div>

<br>

	<div class="row buttons">
		<?php // echo CHtml::submitButton($model->isNewRecord ? 'Asignar' : 'Actualizar'); ?>
	<?php echo CHtml::ajaxButton ("Asignar",
          CController::createUrl('/caja/create'),
          array('type' => 'POST',
              'success'=>'function() {
                window.location.href ="'.Yii::app()->request->baseUrl.'";
                        }'
        ));
                ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->