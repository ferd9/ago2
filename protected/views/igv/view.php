<?php
/*$this->breadcrumbs=array(
	'Igvs'=>array('index'),
	$model->idigv,
);
*/
$this->menu=array(
	//array('label'=>'List Igv', 'url'=>array('index')),
	//array('label'=>'Create Igv', 'url'=>array('create')),
	array('label'=>'Actualizar IGV', 'url'=>array('update', 'id'=>$model->idigv)),
	//array('label'=>'Delete Igv', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idigv),'confirm'=>'Are you sure you want to delete this item?')),
	//array('label'=>'Manage Igv', 'url'=>array('admin')),
);
?>

<h1>IGV</h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'descripcion',
	),
)); ?>
