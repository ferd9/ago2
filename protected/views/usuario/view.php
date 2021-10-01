<?php
$this->breadcrumbs=array(
	'Lista de Usuarios'=>array('index'),
	'Vista del Usuario '.$model->login,
);

$this->menu=array(
	array('label'=>'Lista de Usuarios', 'url'=>array('index')),
	array('label'=>'Crear Usuario', 'url'=>array('create')),
	array('label'=>'Actualizar Usuario', 'url'=>array('update', 'id'=>$model->login)),
	array('label'=>'Borrar Usuario', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->login),'confirm'=>'¿Está seguro que desea eliminar este elemento?')),
	array('label'=>'Administrar Usuarios', 'url'=>array('admin')),
);
?>

<h1>Vista del Usuario [<?php echo $model->login; ?>]</h1>

<?php
$estado_civil="";
switch($model->usuario0->estado_civil)
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
switch($model->usuario0->sexo)
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
		'login',
                array('label'=>'Nivel de Acceso', 'value'=>$model->nivel0->descripcion),
                array('label'=>'Nombre de Almacen', 'value'=>$model->almacen0->nombre),
		'numero_documento',
                array('label'=>'Nombre', 'value'=>$model->usuario0->nombre),
                array('label'=>'Primer Apellido', 'value'=>$model->usuario0->apaterno),
                array('label'=>'Segundo Apellido', 'value'=>$model->usuario0->amaterno),
		array('label'=>'Email', 'value'=>$model->usuario0->email),
                array('label'=>'Telefono', 'value'=>$model->usuario0->telefono),
                array('label'=>'Celular', 'value'=>$model->usuario0->celular),
                array('label'=>'Direccion', 'value'=>$model->usuario0->direccion),
                array('label'=>'Zona', 'value'=>$model->usuario0->zona),
                array('label'=>'Sexo', 'value'=>$sexo_),
                array('label'=>'Estado Civil', 'value'=>$estado_civil),
                array('label'=>'Estado', 'value'=>($model->estado == 1) ? "✔ - Activo" : "✗ - Inactivo"),
	),
)); ?>
