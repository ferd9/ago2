<?php
$this->breadcrumbs=array(
	'Tmptrans Saves'=>array('index'),
	$model->idtmptras,
);

$this->menu=array(
	array('label'=>'List TmptransSave', 'url'=>array('index')),
	array('label'=>'Create TmptransSave', 'url'=>array('create')),
	array('label'=>'Update TmptransSave', 'url'=>array('update', 'id'=>$model->idtmptras)),
	array('label'=>'Delete TmptransSave', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idtmptras),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage TmptransSave', 'url'=>array('admin')),
);
?>

<h1>View TmptransSave #<?php echo $model->idtmptras; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idtmptras',
		'idproducto',
		'nombreproducto',
		'preciocompra',
		'preciosinigv',
		'precioconigv',
		'stockproducto',
	),
)); ?>
