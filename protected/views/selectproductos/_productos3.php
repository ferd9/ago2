<?php
if($activar=="b"){
?>
<?php
$this->beginWidget('zii.widgets.jui.CJuiDialog', array(
    'id'=>'mydialog',
    // additional javascript options for the dialog plugin
    'options'=>array(
        'title'=>'Producto a Comprar',
        'width'=>'auto',
        'height'=>'auto',
        #'position' => 'top',
                'top' => '50px',
                'modal' => true,
                'autoOpen'=>true,
    ),
));
?>
<?php  $this->render('insert3',array(
	'producto'=>$producto,
        'model'=>$model,));?>
<?php
$this->endWidget('zii.widgets.jui.CJuiDialog');
?>
<?php
}
?>

<?php
Yii::app()->clientScript->registerScript('search', "
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('producto-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Lista de Productos</h1>
<br>
 <?php echo CHtml::beginForm(Yii::app()->getRequest()->getUrl(),'GET',array()); ?>
       <?php
       $activar="a";
       echo CHtml::hiddenField('activar',$activar);
       if(strlen($modelProducto->getWordBuscar())!=0)
            echo CHtml::TextField('buscar',$modelProducto->getWordBuscar());
       else
            echo CHtml::TextField('buscar');
       echo Chtml::hiddenField('datoSerializado', $serializado);
       ?>

<?php echo CHtml::submitButton('Buscar');//
//echo CHtml::ajaxButton("Buscar Producto",$this->createUrl('compra/selectProducts'),array('type'=>'GET','replace'=>'#test'));?>
<?php echo CHtml::endForm();
echo $modelProducto->getWordBuscar();
        $palabraBuscar = $modelProducto->getWordBuscar()?$modelProducto->getWordBuscar():$id_producto;
        if(strlen($palabraBuscar)==0)
            $palabraBuscar = 'noselect';

        ?>
<?php
$activar="b";
$this->widget('zii.widgets.grid.CGridView', array(
        'id'=>'producto-grid',
         //'selectableRows'=>2,
	'dataProvider'=>  strlen($buscar)?$modelProducto->buscar($buscar):$modelProducto->search(),
	//'filter'=>$modelProducto,
	'columns'=>array(
		 array(
                'name'=>'idcategoria',
                'header'=>'Categoria',
                'value'=>'$data->idcategoria0->idcategoria0->idcategoria0->descripcion'),
                array(
                'name'=>'idmarca',
                'header'=>'Marca',
                'value'=>'$data->idmarca0->idmarca0->descripcion'),
                array(
                'name'=>'idmodelo',
                'header'=>'Modelo',
                'value'=>'$data->idmodelo0->descripcion'),

                array(
                'name'=>'descripcion',
                'header'=>'Descripcion',
                'value'=>'$data->descripcion'),
                 array(
                'name'=>'precio_con_igv',
                'header'=>'Precio Venta',
                'value'=>'$data->precio_con_igv'),
                array(
                'name'=>'idtipo_moneda',
                'header'=>'Moneda',
                'value'=>'$data->idtipoMoneda0->descripcion'),
		array(
			'class'=>'CButtonColumn',
                        'header'=>'Añadir',
                        'template'=>'{seleccionar}',
                        'buttons'=>array(
                            'seleccionar' => array
                                    (
                                        'imageUrl'=>Yii::app()->request->baseUrl.'/images/icon_select.gif',
                                        'url'=>'Yii::app()->createUrl("selectproductos/GrabarProductosguiaremisioncompra", array("id"=>$data->idproducto,"activar"=>"'.$activar.'","buscar"=>"'.$buscar.'"))',

                                    ),
                                ),
                        ),
	),
));

echo CHtml::endForm(); ?>