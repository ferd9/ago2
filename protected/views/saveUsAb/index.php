<?php
$this->breadcrumbs=array(
	'Save Us Abs',
);

$this->menu=array(
	array('label'=>'Create SaveUsAb', 'url'=>array('create')),
	array('label'=>'Manage SaveUsAb', 'url'=>array('admin')),
);
?>

<h1>Save Us Abs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
