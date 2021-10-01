<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/style.css" media="screen, projection" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

<div class="form" align="left" style="padding-left:30">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'accesorios-soporte-form',
	'enableAjaxValidation'=>false,
)); ?>
        <h1>Agregar Nuevo Accesorio</h1>
        <br>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cantidad_soporte',array('label'=>'Cantidad')); ?>
		<?php echo $form->textField($model,'cantidad_soporte',array('size'=>6,'maxlength'=>6)); ?>
		<?php echo $form->error($model,'cantidad_soporte'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descripcion_soporte',array('label'=>'Descripcion')); ?>
		<?php echo $form->textField($model,'descripcion_soporte',array('size'=>50,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'descripcion_soporte'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'serie_soporte',array('label'=>'Serie')); ?>
		<?php echo $form->textField($model,'serie_soporte',array('size'=>10,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'serie_soporte'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'codigobarras_soporte',array('label'=>'Codigo Barra')); ?>
		<?php echo $form->textField($model,'codigobarras_soporte',array('size'=>10,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'codigobarras_soporte'); ?>
	</div>

	<div class="row">
		<?php /*echo $form->labelEx($model,'usuario_sopore');*/?>
		<?php echo $form->hiddenField($model,'usuario_sopore',array('size'=>60,'maxlength'=>100,'value'=>Yii::app()->user->name)); ?>
		<?php /*echo $form->error($model,'usuario_sopore'); */?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Agregar' : 'Actualizar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->