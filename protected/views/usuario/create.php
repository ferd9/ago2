<?php
$this->breadcrumbs=array(
	'Lista de Usuarios'=>array('index'),
	'Crear Usuario',
);

$this->menu=array(
	array('label'=>'Lista de Usuario', 'url'=>array('index')),
	array('label'=>'Administracion de Usuario', 'url'=>array('admin')),
);
?>

<h1>Crear Usuario</h1>

<?php echo $this->renderPartial('_form',
        array('model'=>$model,'lugar'=>$lugar,'persona'=>$persona,'almacen'=>$almacen,'nivel'=>$nivel)
        ); ?>