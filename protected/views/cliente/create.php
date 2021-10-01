<?php
$this->breadcrumbs=array(
	'Lista de Clientes'=>array('index'),
	'Crear Cliente',
);

$this->menu=array(
	array('label'=>'Lista de Clientes', 'url'=>array('index')),
        array('label'=>'Crear otro Tipo de Cliente', 'url'=>array('create')),
	array('label'=>'Administrar Clientes', 'url'=>array('admin')),
);
?>

<h1>Crear Cliente</h1>

<?php 

$tipoccc=$_POST['iddtc'];
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
else
{
echo $this->renderPartial('_forma', array('model'=>$model,'tipocliente'=>$tipocliente,'persona'=>$persona,'ubigeo'=>$ubigeo));
}
?>