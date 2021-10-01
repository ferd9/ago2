<?php
$this->breadcrumbs=array(
	'Lista de Usuarios'=>array('index'),
	'Vista del Usuario '.$model->login=>array('view','id'=>$model->login),
	'Actualizar Usuario '.$model->login,
);

$this->menu=array(
	array('label'=>'Lista de Usuario', 'url'=>array('index')),
	array('label'=>'Crear Usuario', 'url'=>array('create')),
	array('label'=>'Ver Usuario', 'url'=>array('view', 'id'=>$model->login, 'idp'=>$model->usuario0->idpersona)),
	array('label'=>'Administracion de Usuario', 'url'=>array('admin')),
);
?>

<h1>Actualizar Usuario <?php echo $model->login; ?></h1>

<?php echo $this->renderPartial('_form_update',
array('model'=>$model,'lugar'=>$lugar,'persona'=>$persona,'almacen'=>$almacen,'nivel'=>$nivel,'almacenito'=>$almacenito,'nivelito'=>$nivelito)); ?>