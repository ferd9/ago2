<?php

class CajaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
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
               //echo "caja - $estado <br>";
               //echo "nivel - $nivelll";
		return array(

                        array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('activarcaja'),
                                'users'=>array('@'),
                                'expression'=>"{$nivelll}==1 || {$nivelll}==2",

			),
                        array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view','saldo'),
                                'users'=>array('@'),
                                'expression'=>"{$nivelll}==1 && {$estado}==1 || {$nivelll}==2 && {$estado}==1 ",
                               
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create'),
                                'users'=>array('@'),
				'expression'=>"{$nivelll}==1 && {$estado}==1 || {$nivelll}==2 && {$estado}==1 ",
			),

                        array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
                                'users'=>array('@'),
				'expression'=>"{$nivelll}==1 && {$estado}==1",
			),

			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
                                'users'=>array('@'),
				'expression'=>"{$nivelll}==1 && {$estado}==1",
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
                   );
             
	}

        public function actionActivarcaja()
        {   
            $model = new Caja;
            $almacen =new Almacen;
            $tipoMoneda = new TipoMoneda;
            $tipomovimiento = new TipoMovimiento;
            $fechactual=date('Y-m-d');
            $horactual=date('h:i:s');
            $usuarioacti=Yii::app()->user->name;
            $estadocaja=CajaController::getEstadoActi($fechactual);
            if($estadocaja==0)
            {
            $connection=  Yii::app()->db;
            $sqlStatement="INSERT INTO activarcaja(fechactivar,horactivar,usuarioactivar) VALUES('".$fechactual."','".$horactual."','".$usuarioacti."');";
            $command=$connection->createCommand($sqlStatement);
            $command->execute();
           
		$this->render('apertura',array(
			'model'=>$model,
                        'almacen'=>$almacen,
                        'tipoMoneda'=>$tipoMoneda,
                        'tipomovimiento'=>$tipomovimiento,
		));
            }
        }

        public static function getEstadoActi($fechactual)
        {
            $idestado = Activarcaja::model()->findAllBySql("SELECT estadoactivar FROM activarcaja WHERE fechactivar = '".$fechactual."'");
            if(count($idestado)>0)
	    $estadocaja = $idestado[(count($idestado)-1)]['estadoactivar'];
	    else 
		$estadocaja = 0;
            return $estadocaja;
        }

        public static function getHoraActi($fechactual)
        {
            $idestadoa = Activarcaja::model()->findAllBySql("SELECT horactivar FROM activarcaja WHERE fechactivar = '".$fechactual."'");
	    if(count($idestadoa)>0)
		$horacaja = $idestadoa[(count($idestadoa)-1)]['horactivar'];
	    else 
		$horacaja = 0;
            return $horacaja;
        }

        public static function getUserActi($fechactual)
        {
            $idestadob = Activarcaja::model()->findAllBySql("SELECT usuarioactivar FROM activarcaja WHERE fechactivar = '".$fechactual."'");
            if(count($idestadob)>0)
	    $usercaja = $idestadob[(count($idestadob)-1)]['usuarioactivar'];
	    else 
		$usercaja  = 0;
            return $usercaja;
        }


	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
        public function actionSaldo()
	{
		$fechactual=date('Y-m-d');
                $id = Caja::getidcajaapertura($fechactual);
                $entrada = Caja::getmontoentrada($fechactual);
                $salida = Caja::getmontosalida($fechactual);
                $this->render('saldo',array(                        
			'model'=>$this->loadModel($id),
                        'entrada'=>$entrada,
                        'salida'=>$salida,
		));
	}

	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model = new Caja;
                $almacen =new Almacen;
                $tipoMoneda = new TipoMoneda;
                $tipomovimiento = new TipoMovimiento;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Caja']))
		{
			$model->attributes=$_POST['Caja'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idcaja));
		}

		$this->render('create',array(
			'model'=>$model,
                        'almacen'=>$almacen,
                        'tipoMoneda'=>$tipoMoneda,
                        'tipomovimiento'=>$tipomovimiento,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Caja']))
		{
			$model->attributes=$_POST['Caja'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idcaja));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'index' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
               
		$dataProvider=new CActiveDataProvider('Caja', array(
                        'criteria'=>array(
                                'order'=>'CONCAT(fecha_caja,hora) DESC',
                                ),
                ));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Caja('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Caja']))
			$model->attributes=$_GET['Caja'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Caja::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='caja-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
