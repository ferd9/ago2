<?php
/*$this->breadcrumbs=array(
	'Igvs'=>array('index'),
	$model->idigv=>array('view','id'=>$model->idigv),
	'Update',
);
*/
$this->menu=array(
	//array('label'=>'List Igv', 'url'=>array('index')),
	//array('label'=>'Create Igv', 'url'=>array('create')),
	array('label'=>'IGV', 'url'=>array('view', 'id'=>$model->idigv)),
	//array('label'=>'Manage Igv', 'url'=>array('admin')),
);
?>

<h1>Actualizar IGV</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>