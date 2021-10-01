<?php/*
$this->breadcrumbs=array(
	'Pcompra Vistas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List PcompraVista', 'url'=>array('index')),
	array('label'=>'Create PcompraVista', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('pcompra-vista-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Pcompra Vistas</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->
*/?>


<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'pcompra-vista-grid',
	'dataProvider'=>$model->search(),
	//'filter'=>$model,
	'columns'=>array(
                array(
                'name'=>'cantidad',
                'header'=>'Cantidad',
                'value'=>'$data->cantidad'),
		array(
                'name'=>'nomproducto',
                'header'=>'Nombre Producto',
                'value'=>'$data->nomproducto'),
                array(
                'name'=>'precio',
                'header'=>'Precio',
                'value'=>'$data->precio'),
                array(
                'name'=>'moneda',
                'header'=>'Moneda',
                'value'=>'$data->moneda'),
                array(
                'name'=>'tipo_adquisicion',
                'header'=>'Tipo Adquisicion',
                'value'=>'$data->tipo_adquisicion'),	
	),
)); ?>
