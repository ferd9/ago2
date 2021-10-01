<?php
$this->breadcrumbs=array(
	'Pcompras',
);

$this->menu=array(
	array('label'=>'Create Pcompra', 'url'=>array('create')),
	array('label'=>'Manage Pcompra', 'url'=>array('admin')),
);
?>

<h1>Pcompras</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
