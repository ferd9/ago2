<?php
$this->breadcrumbs=array(
	'Tmptrans Saves'=>array('index'),
	$model->idtmptras=>array('view','id'=>$model->idtmptras),
	'Update',
);

$this->menu=array(
	array('label'=>'List TmptransSave', 'url'=>array('index')),
	array('label'=>'Create TmptransSave', 'url'=>array('create')),
	array('label'=>'View TmptransSave', 'url'=>array('view', 'id'=>$model->idtmptras)),
	array('label'=>'Manage TmptransSave', 'url'=>array('admin')),
);
?>

<h1>Update TmptransSave <?php echo $model->idtmptras; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>