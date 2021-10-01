<?php
$this->breadcrumbs=array(
	'Accesorios Soportes'=>array('index'),
	'Create',
);

?>

<h1>Agregar Nuevo Accesorio</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>