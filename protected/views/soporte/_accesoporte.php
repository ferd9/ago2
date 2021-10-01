<html>
    <head>

    </head>
    <body>
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'accesorios-soporte-form',
        'htmlOptions'=>array('style'=>'form'),
	'enableAjaxValidation'=>false,
)); ?>

	<?php echo $form->errorSummary($accesoriosSoporte); ?>

<div class="inline">

    <div class="column">
		<?php echo $form->labelEx($accesoriosSoporte,'cantidad_soporte',array('label'=>'Cantidad')); ?>
		<?php echo CHtml::activeTextField($accesoriosSoporte,'cantidad_soporte',array('size'=>4,'maxlength'=>6,'id'=>'cantidad_soporte')); ?>
		<?php echo $form->error($accesoriosSoporte,'cantidad_soporte'); ?>
	</div>

	<div class="column">
		<?php echo $form->labelEx($accesoriosSoporte,'descripcion_soporte',array('label'=>'Descripcion')); ?>
		<?php echo CHtml::activeTextField($accesoriosSoporte,'descripcion_soporte',array('size'=>50,'maxlength'=>200,'id'=>'descripcion_soporte')); ?>
		<?php echo $form->error($accesoriosSoporte,'descripcion_soporte'); ?>
	</div>

	<div class="column">
		<?php echo $form->labelEx($accesoriosSoporte,'serie_soporte',array('label'=>'Serie')); ?>
		<?php echo CHtml::activeTextField($accesoriosSoporte,'serie_soporte',array('size'=>10,'maxlength'=>100,'id'=>'serie_soporte')); ?>
		<?php echo $form->error($accesoriosSoporte,'serie_soporte'); ?>
	</div>

	<div class="column">
		<?php echo $form->labelEx($accesoriosSoporte,'codigobarras_soporte',array('label'=>'Codigo Barra')); ?>
		<?php echo CHtml::activeTextField($accesoriosSoporte,'codigobarras_soporte',array('size'=>10,'maxlength'=>100,'id'=>'codigobarras_soporte')); ?>
		<?php echo $form->error($accesoriosSoporte,'codigobarras_soporte'); ?>
	</div>
</div>
<div class="clear"> </div>
	<div class="row">
		<?php /*echo $form->labelEx($accesoriosSoporte,'usuario_sopore'); */?>
		<?php echo $form->hiddenField($accesoriosSoporte,'usuario_sopore',array('size'=>60,'maxlength'=>100,'value'=>Yii::app()->user->name)); ?>
		<?php /* echo $form->error($accesoriosSoporte,'usuario_sopore'); */?>
	</div>

<div class="row buttons">
<?php echo CHtml::ajaxButton ("Agregar Accesorio",
          CController::createUrl('/accesoriosSoporte/create'),
          array('type' => 'POST',
            'success'=>'js:function() {
            $.fn.yiiGridView.update("accesorios-soporte-grid");
            document.getElementById("cantidad_soporte").value="";
            document.getElementById("descripcion_soporte").value="";
            document.getElementById("serie_soporte").value="";
            document.getElementById("codigobarras_soporte").value="";
                        }'
        ));
                ?>

</div>

<?php
        $this->endWidget(); ?>

</div><!-- form -->

    </body>
</html>