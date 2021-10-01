<?php
$this->breadcrumbs=array(
	'Tmptrans'=>array('index'),
	$model->idtmptras,
);

$this->menu=array(
	array('label'=>'List Tmptrans', 'url'=>array('index')),
	array('label'=>'Create Tmptrans', 'url'=>array('create')),
	array('label'=>'Update Tmptrans', 'url'=>array('update', 'id'=>$model->idtmptras)),
	array('label'=>'Delete Tmptrans', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idtmptras),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Tmptrans', 'url'=>array('admin')),
);
?>

<h1>View Tmptrans #<?php echo $model->idtmptras; ?></h1>

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
