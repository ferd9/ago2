<?php
/*
$this->breadcrumbs=array(
	'Save Us Abs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List SaveUsAb', 'url'=>array('index')),
	array('label'=>'Create SaveUsAb', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('save-us-ab-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>
<?php /*
<h1>Manage Save Us Abs</h1>

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
	'id'=>'save-us-ab-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
		array(
                'name'=>'cantidad',
                'header'=>'Cantidad',
                'value'=>'$data->cantidad'),
                array(
                'name'=>'nomproducto',
                'header'=>'Producto',
                'value'=>'$data->nomproducto'),
                array(
                'name'=>'moneda',
                'header'=>'Moneda',
                'value'=>'$data->moneda'),
                array(
                'name'=>'precio',
                'header'=>'Precio',
                'value'=>'$data->precio'),
                array(
                'name'=>'nro_serie',
                'header'=>'NroSerie',
                'value'=>'$data->nro_serie'),
                array(
                'name'=>'codigo_barras',
                'header'=>'CodBarra',
                'value'=>'$data->codigo_barras'),
                array(
                'name'=>'tipo_adquisicion',
                'header'=>'Tipo Adquisicion',
                'value'=>'$data->tipo_adquisicion'),
                array(
                'name'=>'tipo_ingreso',
                'header'=>'Tipo Ingreso',
                'value'=>'$data->tipo_ingreso'),
                array(
                'name'=>'garantia',
                'header'=>'Garantia',
                'value'=>'$data->garantia'),
                array(
                'name'=>'descripcion',
                'header'=>'Descripcion Servicio',
                'value'=>'$data->descripcion'),
	),
)); ?>