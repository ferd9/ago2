<div class="form">
<?php echo CHtml::beginForm(Yii::app()->getRequest()->getUrl(),'post',array()); ?>
        <p class="note"> Eliga un Tipo de Cliente a Crear.</p>
        <div class="row">
		<?php
                     $tipomonedad = new CDbCriteria;
                     $tipomonedad->order = 'descripcion asc';
                     $listatipomoneda =CHtml::listData(TipoCliente::model()->findAll($tipomonedad),'idtipo_cliente','descripcion');
                ?>
		<?php echo CHtml::radioButtonList('iddtc','1',$listatipomoneda,array('separator'=>'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;','labelOptions'=>array('style'=>'display:inline'))) ;?>

	</div>

        <div class="row_submit">
        <?php echo CHtml::submitButton(Yii::t("_form", "Siguiente")); ?>
        </div>
<?php echo CHtml::endForm(); ?>
</div><!-- form -->