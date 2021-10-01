<?php
$this->breadcrumbs=array(
	'Lista de Clientes'=>array('index'),
	'Vista del Cliente '.$model->idcliente=>array('view','id'=>$model->idcliente),
	'Actualizar Cliente '.$model->idcliente,
);

$this->menu=array(
	array('label'=>'Lista de  Clientes', 'url'=>array('index')),
	array('label'=>'Crear Cliente', 'url'=>array('create')),
	array('label'=>'Ver Cliente', 'url'=>array('view', 'id'=>$model->idcliente)),
	array('label'=>'Administrar Clientes', 'url'=>array('admin')),
);
?>

<h1>Actualizar Cliente <?php echo $model->idcliente; ?></h1>

<?php
if($tipoccc==1)
{
   $tipoccc=(int)1;
   echo $this->renderPartial('_form', array('model'=>$model,'tipocliente'=>$tipocliente,'tipoccc'=>$tipoccc,'persona'=>$persona,'ubigeo'=>$ubigeo));
}
elseif($tipoccc==2)
{
   $tipoccc=(int)2;
   echo $this->renderPartial('_form2', array('model'=>$model,'tipocliente'=>$tipocliente,'tipoccc'=>$tipoccc,'persona'=>$persona,'ubigeo'=>$ubigeo));
}
?>