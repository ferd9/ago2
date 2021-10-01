<?php
$this->breadcrumbs=array(
	'Tmptrans'=>array('index'),
	$model->idtmptras=>array('view','id'=>$model->idtmptras),
	'Update',
);

$this->menu=array(
	array('label'=>'List Tmptrans', 'url'=>array('index')),
	array('label'=>'Create Tmptrans', 'url'=>array('create')),
	array('label'=>'View Tmptrans', 'url'=>array('view', 'id'=>$model->idtmptras)),
	array('label'=>'Manage Tmptrans', 'url'=>array('admin')),
);
?>

<h1>Update Tmptrans <?php echo $model->idtmptras; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>