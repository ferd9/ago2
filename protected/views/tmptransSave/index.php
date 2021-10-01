<?php
$this->breadcrumbs=array(
	'Tmptrans Saves',
);

$this->menu=array(
	array('label'=>'Create TmptransSave', 'url'=>array('create')),
	array('label'=>'Manage TmptransSave', 'url'=>array('admin')),
);
?>

<h1>Tmptrans Saves</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
