<?php
$this->breadcrumbs=array(
	'Tmptrans',
);

$this->menu=array(
	array('label'=>'Create Tmptrans', 'url'=>array('create')),
	array('label'=>'Manage Tmptrans', 'url'=>array('admin')),
);
?>

<h1>Tmptrans</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
