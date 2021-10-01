<?php
$this->breadcrumbs=array(
	'Save Uses',
);

$this->menu=array(
	array('label'=>'Create SaveUs', 'url'=>array('create')),
	array('label'=>'Manage SaveUs', 'url'=>array('admin')),
);
?>

<h1>Save Uses</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
