<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'producto-form',
	'enableAjaxValidation'=>false,
        'htmlOptions'=>array('enctype'=>'multipart/form-data'),
)); ?>
	<p class="note">Estos Campos  <span class="required">*</span> son requeridos.</p>
	<?php echo $form->errorSummary($model); ?>


<div class="row">
<?php echo "<strong>Proveedor:</strong><br>"; ?>
<?php
if($proveedor=="")
{
}
else
{
echo "El Proveedor: ".$proveedor."<br>";
}
$this->widget('zii.widgets.jui.CJuiAutoComplete',
array('name'=>'idproveedor',
    'attribute'=>'idproveedor',
    'source'=>Proveedor::getListProveedor(),
    'options'=>array('minLength'=>'2',),
    'htmlOptions'=>array( 'style'=>'height:20px;','size'=>'80px'),));
?>
</div>
<div class="inline">
        <div class="column">
        <?php echo $form->labelEx($model,'idcategoria',array('label'=>'Categoria'));  ?>
        <?php echo $form->dropDownList($model,'idcategoria',CHtml::listData(Categoria::model()->findAll(), 'idcategoria', 'descripcion'), array(
			'ajax' => array(
				'type'=>'POST',
				'url'=>CController::createUrl('Producto/marcas'),
				'update'=>'#'.CHtml::activeId($model,'idmarca'),
                             'beforeSend' => 'function(){
                                    $("#page").addClass("loading");}',
                                'complete' => 'function(){
                                    $("#page").removeClass("loading");
                                    $("#' . CHtml::activeId($model,'project_id') . '").trigger("change");
                                }',
			)));
                ?>
            <?php echo $form->error($model,'idcategoria'); ?>
    </div>
    <div class="column">
       <?php echo $form->labelEx($model,'idmarca',array('label'=>'Marca')); ?>
		<?php echo $form->dropDownList($model,'idmarca', CHtml::listData(Marca::model()->findAll('idcategoria= :categoria', array(':categoria'=>$model->idcategoria)), 'idmarca', 'descripcion'), array(
			'ajax' => array(
				'type'=>'POST',
				'url'=>CController::createUrl('Producto/modelo'),
				'update'=>'#'.CHtml::activeId($model,'idmodelo'),
                            'beforeSend' => 'function(){
                                    $("#page").addClass("loading");}',
                                'complete' => 'function(){
                                    $("#page").removeClass("loading");}',
                               
			)));
		?>
		<?php echo $form->error($model,'idmarca'); ?>
    </div>
 <div class="column">
                 <?php echo $form->labelEx($model,'idmodelo',array('label'=>'Modelo')); ?>
		<?php echo $form->dropDownList($model,'idmodelo', CHtml::listData(Modelo::model()->findAll('idmarca= :marca', array(':marca'=>$model->idmarca)), 'idmodelo', 'descripcion')); ?>
		<?php echo $form->error($model,'idmodelo'); ?>
    </div>
</div>
<div class="clear"> </div>
<br>
<div class="inline">
        <div class="column">
		<?php echo $form->labelEx($model,'descripcion'); ?>
		<?php echo $form->textField($model,'descripcion',array('size'=>80,'maxlength'=>250)); ?>
		<?php echo $form->error($model,'descripcion'); ?>
	</div>
</div>
<div class="clear"> </div>
<br>
<div class="inline">
        <div class="column">
		<?php echo $form->labelEx($tipomoneda,'idtipo_moneda',array('label'=>'Moneda'));
                     $tipomonedad = new CDbCriteria;
                     $tipomonedad->order = 'descripcion asc';
                     $listatipomoneda =CHtml::listData(TipoMoneda::model()->findAll($tipomonedad),'idtipo_moneda','descripcion');
                ?>
		<?php echo $form->dropDownList($tipomoneda,'idtipo_moneda',$listatipomoneda) ;?>
		<?php echo $form->error($tipomoneda,'idtipo_moneda'); ?>
	</div>

    <div class="column">
		<?php echo $form->labelEx($igv,'idigv',array('label'=>'IGV'));
                     $igvd = new CDbCriteria;
                     $igvd->order = 'descripcion asc';
                     $listaigv =CHtml::listData(Igv::model()->findAll($igvd),'idigv','descripcion');
                ?>
		<?php echo $form->dropDownList($igv,'idigv',$listaigv) ;?>
		<?php echo $form->error($igv,'idigv'); ?>
	</div>

        <div class="column">
		<?php echo $form->labelEx($model,'unidad_medida'); ?>
		<?php echo $form->textField($model,'unidad_medida',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'unidad_medida'); ?>
	</div>
</div>
<div class="clear"> </div>
<br>
<div class="inline">
        <div class="column">
		<?php echo $form->labelEx($model,'precio_compra'); ?>
		<?php echo $form->textField($model,'precio_compra',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'precio_compra'); ?>
	</div>
	<div class="column">
		<?php echo $form->labelEx($model,'precio_sin_igv'); ?>
		<?php echo $form->textField($model,'precio_sin_igv',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'precio_sin_igv'); ?>
	</div>
	<div class="column">
		<?php echo $form->labelEx($model,'precio_con_igv'); ?>
		<?php echo $form->textField($model,'precio_con_igv',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'precio_con_igv'); ?>
	</div>
	<div class="column">
		<?php echo $form->labelEx($model,'descuento'); ?>
		<?php echo $form->textField($model,'descuento',array('size'=>9,'maxlength'=>9)); ?>
		<?php echo $form->error($model,'descuento'); ?>
	</div>
</div>
<div class="clear"> </div>
<br>
	

        <div class="row">
                <?php echo CHtml::activeLabel($model,'foto'); ?>
                <?php echo CHtml::activeFileField($model, 'foto'); ?>

                <?php echo CHtml::hiddenField('oculto',MyController::campoHiddenProducto($model->idproducto)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Grabar' : 'Actualizar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->