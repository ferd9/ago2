<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'producto-proveedor-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Los campos <span class="required">*</span> son requeridos.</p>

	<?php echo $form->errorSummary($model); ?>

        <div class="row">
           <?php echo $form->labelEx($model,'proveedor'); ?>
            <?php
            $this->widget('zii.widgets.jui.CJuiAutoComplete', array(
                'model'=>$model,
                'attribute'=>'proveedor',
                'source'=>  Proveedor::getListProveedores(),
                // additional javascript options for the autocomplete plugin
                'options'=>array(
                    'minLength'=>'2',
                    'size'=>40,
                ),
                'htmlOptions'=>array(
                    'style'=>'height:20px;'
                ),
            ));
            ?>

		<?php //echo $form->textField($model,'idproveedor'); ?>
		<?php echo $form->error($model,'proveedor'); ?>
	</div>


	<div class="row">
		<?php echo $form->labelEx($model,'producto'); ?>
		<?php echo $form->textField($model,'producto'); ?>
		<?php echo $form->error($model,'producto'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Asignar' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->