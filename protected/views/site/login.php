<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableAjaxValidation'=>false,
)); ?>

<p class="form_text"><?php echo $form->labelEx($model,'',array('label'=>'*Usuario')); ?></p>
<p class="form_input_BG"><?php echo $form->textField($model,'username'); ?></p>
<p class="form_text"><?php echo $form->error($model,'username'); ?></p>

<p class="clear">&nbsp;</p>

<p class="form_text"><?php echo $form->labelEx($model,'',array('label'=>'*Contraseña')); ?></p>
<p class="form_input_BG" style="margin-left:8px;"><?php echo $form->passwordField($model,'password'); ?></p>
<p class="form_text"><?php echo $form->error($model,'password'); ?></p>
<p class="clear">&nbsp;</p>
<p class="form_login_signup_btn" style="margin-left:96px;">
<?php echo CHtml::submitButton('Ingreso',array('value'=>'Iniciar Sesión')); ?>
</p>

<p class="form_text2">
<?php
// the link that may open the dialog
echo CHtml::link('¿Quienes Somos?', '#', array(
   'onclick'=>'$("#mydialog").dialog("open"); return false;',
));
echo" || ";
// the link that may open the dialog
echo CHtml::link('Características', '#', array(
   'onclick'=>'$("#mydialog2").dialog("open"); return false;',
));
echo"  ";
?>
</p>


<?php
$titulo=$this->pageTitle=Yii::app()->name;
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'mydialog',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'R&Angeles Consultores',
        'autoOpen'=>false,
        'width'=>'500px',
        'height'=>'auto',
        #'position' => 'top',
        'top' => '80px',
        'modal' => true,
    ),
));

echo '
<br>
<div id="texto" align="justify"><span class="amarillo">Este Sistema solo tiene como objetivo ser didactico  y servir de ejemplo. Desarrollado por 3l@Pr3nd1z:fernando Perez.</span></div>
';

$this->endWidget('zii.widgets.jui.CJuiDialog');
?>    
<?php
$titulo=$this->pageTitle=Yii::app()->name;
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'mydialog2',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>$titulo,
        'autoOpen'=>false,
        'width'=>'800px',
        'height'=>'auto',
        #'position' => 'top',
        'top' => '50px',
        'modal' => true,
    ),
));

echo '
<div align="left">
<p>Software de Gestión de Empresas Comerciales - Facturación (Compra - Venta), Soporte Técnico.</p>
<p>Software Vía Web y Seguro que le permitirá tener un mejor control de su Empresa.</p>
<p>Especialmente diseñado para su implementación en Empresas Comerciales, Servicios e incluso de Producción. (Distribuidoras, Importadoras, Markets, Ferreterias, Farmacias, Automotrices, Informáticas, Abarrotes, Librerias, Talleres, Fábricas etc).</p>
<ul style="padding-left:40px">
    <li>Sistema Multi-Usuario, Multi-Monetario y Multi-Almacén.</li>
    <li>Permite almacenar y visualizar la fotografía de cada uno de sus productos (formato JPG)</li>
    <li>Genera archivos XLS Excel desde todos sus reportes.</li>
    <li>Sistema vía Internet.</li>
    <li>Muy Fácil de Usar.</li>
    <li>Compra, Venta, Clientes, Proveedores, Alamcén, Caja.</li>
    <li>Garantía, Soporte Técnico y Asesoría.</li>
</ul>

</div>
';

$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
<?php $this->endWidget(); ?>