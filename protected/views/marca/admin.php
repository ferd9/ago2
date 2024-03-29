<?php
$this->breadcrumbs=array(
	'Marcas'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List Marca', 'url'=>array('index')),
	array('label'=>'Create Marca', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('marca-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Marcas</h1>

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

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'marca-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'idmarca',
		'idcategoria',
		'descripcion',
		array(
			'class'=>'CButtonColumn',
                        'template'=>'{view}{update}{delete}',
                        'buttons'=>array
                        (
                            'update' => array
                            (
                                //'label'=>'Actualizar',
                                //'imageUrl'=>Yii::app()->request->baseUrl.'/images/email.png',
                                'url'=>'Yii::app()->createUrl("marca/update", array("id"=>$data->idmarca))',
                            ),
                            'view' => array
                            (                                
                                'url'=>'Yii::app()->createUrl("marca/view", array("id"=>$data->idmarca))',
                            ),
                            'delete' => array
                            (
                                'url'=>'Yii::app()->createUrl("marca/delete", array("id"=>$data->idmarca))',
                            ),
                        ),
		),
	),
)); ?>
