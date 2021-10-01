<?php
$this->breadcrumbs=array(
	'Accesorios Soportes'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List AccesoriosSoporte', 'url'=>array('index')),
	array('label'=>'Create AccesoriosSoporte', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('create', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('accesorios-soporte-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Accesorios Soportes</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('create',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'accesorios-soporte-grid',
	'dataProvider'=>$model->search(),
	'columns'=>array(
                array(
                'name'=>'cantidad_soporte',
                'header'=>'Cantidad',
                'value'=>'$data->cantidad_soporte'),
                array(
                'name'=>'descripcion_soporte',
                'header'=>'Descripcion',
                'value'=>'$data->descripcion_soporte'),
                array(
                'name'=>'serie_soporte',
                'header'=>'Serie',
                'value'=>'$data->serie_soporte'),
		array(
                'name'=>'codigobarras_soporte',
                'header'=>'CodigoBarra',
                'value'=>'$data->codigobarras_soporte'),
		array(
			'class'=>'CButtonColumn',
                        'header'=>'Quitar',
                        'template'=>'{delete}',

		),
	),
)); ?>
