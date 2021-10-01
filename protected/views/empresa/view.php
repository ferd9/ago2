<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
<?php
$this->breadcrumbs=array(
	'Lista de Empresa'=>array('index'),
	'Vista Empresa # '.$model->idempresa,
);

$this->menu=array(
	array('label'=>'Lista de Empresas', 'url'=>array('index')),
	array('label'=>'Crear una Empresa', 'url'=>array('create')),
	array('label'=>'Actualizar Empresa', 'url'=>array('update', 'id'=>$model->idempresa)),
	array('label'=>'Borrar Empresa', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idempresa),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Administrar Empresas', 'url'=>array('admin')),
);
?>

<h1>Vista Empresa #<?php echo $model->idempresa; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		//'idempresa',
		array('name'=>'empresa','value'=>$model->empresa0->nombre),
		'ruc',
		//'lgo',
                array(
                'name'=>'lgo',
                'type'=>'image',
                'value'=>Yii::app()->request->baseUrl."/images/".'_'.$model->lgo,
                ),
	),
)); ?>
