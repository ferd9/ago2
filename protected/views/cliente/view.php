<?php
$this->breadcrumbs=array(
	'Lista de Clientes'=>array('index'),
	'Vista del Cliente '.$model->idcliente,
);

$this->menu=array(
	array('label'=>'Lista de Clientes', 'url'=>array('index')),
	array('label'=>'Crear Cliente', 'url'=>array('create')),
	array('label'=>'Actualizar Cliente', 'url'=>array('update', 'id'=>$model->idcliente)),
	array('label'=>'Borrar Cliente', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idcliente),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Clientes', 'url'=>array('admin')),
);
?>

<h1>Vista del Cliente [<?php echo $model->idcliente; ?>]</h1>

<?php

$estado_civil="";
switch($model->cliente0->estado_civil)
                {
                case 's':
                $estado_civil='Soltero/a';
                break;
                case 'c':
                $estado_civil= 'Casado/a';
                break;
                case 'b':
                $estado_civil= 'Conviviente';
                break;
                case 'v':
                $estado_civil= 'Viudo/a';
                break;
                case 'd':
                $estado_civil= 'Divorciado/a';
                break;
                case 'r':
                $estado_civil= 'Separado/a';
                break;
                default :
                    $estado_civil= "";
                }


$sexo_="";
switch($model->cliente0->sexo)
                {
                case 'm':
                $sexo_='Masculino';
                break;
                case 'f':
                $sexo_= 'Femenino';
                break;
                default :
                    $sexo_= "";
                }

$this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idcliente',
                array('label'=>'Tipo Cliente', 'value'=>$model->idtipoCliente0->descripcion),
		'numero_documento',
                array('label'=>'Nombre', 'value'=>$model->cliente0->nombre),
                array('label'=>'Primer Apellido', 'value'=>$model->cliente0->apaterno),
                array('label'=>'Segundo Apellido', 'value'=>$model->cliente0->amaterno),
		array('label'=>'Email', 'value'=>$model->cliente0->email),
                array('label'=>'Telefono', 'value'=>$model->cliente0->telefono),
                array('label'=>'Celular', 'value'=>$model->cliente0->celular),
                array('label'=>'Direccion', 'value'=>$model->cliente0->direccion),
                array('label'=>'Zona', 'value'=>$model->cliente0->zona),
                array('label'=>'Sexo', 'value'=>$sexo_),
                array('label'=>'Estado Civil', 'value'=>$estado_civil),
		array('label'=>'Estado', 'value'=>($model->estado == 1) ? "✔ - Activo" : "✗ - Inactivo"),
	),
)); ?>

