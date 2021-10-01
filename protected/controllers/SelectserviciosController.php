<?php
class SelectserviciosController extends Controller{


    public $layout='//layouts/capaProductos';

         public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}


        public function accessRules()
	{

                $nivelll=Yii::app()->user->getId();
                $usernivel=Yii::app()->user->name;
                $user2=Yii::app()->user->isGuest;
                $fechactual=date('Y-m-d');
                $estadocaja=CajaController::getEstadoActi($fechactual);
                if($estadocaja=="")
                {
                  $estado=2;
                }
                elseif($estadocaja==1)
                {
                  $estado=1;
                }
            return array(
			 array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
                                'users'=>array('*'),
                                'expression'=>"{$nivelll}==1 && {$estado}==1 || {$nivelll}==2 && {$estado}==1 ",

			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','productos'),
                                'users'=>array('*'),
				'expression'=>"{$nivelll}==1 && {$estado}==1 || {$nivelll}==2 && {$estado}==1 ",
			),

                        array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
                                'users'=>array('*'),
				'expression'=>"{$nivelll}==1 && {$estado}==1",
			),

			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','GrabarServicios','GrabarServiciosab'),
                                'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

        public function actionView()
	{
		echo "<h1>Esta Opcion no esta disponible</h1>";
	}

        
        public function actionGrabarServicios()
        {

                $model=new Servicio('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Servicio']))
			$model->attributes=$_GET['Servicio'];

		$this->render('_listaservicio',array(
			'model'=>$model,
		));
        }

        public function actionGrabarServiciosab()
        {

                $model=new Servicio();

		$this->render('_listaservicio',array(
			'model'=>$model,
		));
        }

        
         protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='producto-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
?>
