<?php

class EmpresaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';
        //public static $datoDepart='null';

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
	{       $nivelll=Yii::app()->user->getId();
                $usernivel=Yii::app()->user->name;
                $user2=Yii::app()->user->isGuest;
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('@'),
                                'expression'=>"{$nivelll}==1",
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('provincia','distrito','limpiar'),
				'users'=>array('@'),
			),

                        array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
                                'users'=>array('@'),
				'expression'=>"{$nivelll}==1",
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
                                'users'=>array('@'),
				'expression'=>"{$nivelll}==1",
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
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
		$model=new Empresa;
                $person = new Persona();
                $lugar = new Ubigeo();
                $datos=new Ubigeo();

                // Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

                $image = array();
                foreach ($_FILES as $value)
                {
                    foreach ($value as $file)
                    {
                        foreach ($file as $archivo)
                        {
                            array_push($image, $archivo);
                        }
                    }
                }
                $namefile='';
                if($image[0]!=''){$namefile = MyController::renombrarArchivo($image);}


                $nombrecompleto=$_POST['Persona']['nombre'];

		if($_POST['Empresa'])
		{                                        
                    $person->attributes=$_POST['Persona'];

                    $person->ubigeo=UbigeoController::getIdUbigeo($_POST['Ubigeo']['coddpto'], $_POST['city_id'], $_POST['prov_id']);
                    $person->nombrecompleto=$nombrecompleto;

                    if($person->save())
                    {                            
                            $model->attributes=$_POST['Empresa'];

                            $model->empresa=PersonaController::getIdPersona($nombrecompleto);
                            $model->lgo=$namefile;
                            $model->usuario=(Yii::app()->user->name);

                            if($model->save())
                            {
                                if($image[0]!=''){MyController::subirArchivo($image,'images/',$namefile);}
                                $this->redirect(array('view','id'=>$model->idempresa));
                            }
                    }

		}


		$this->render('create',array(
			'model'=>$model,
                        'person'=>$person,
                        'lugar'=>$lugar,
                        'datos'=>$datos,
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
                $idp=Empresa::model()->findAllBySql("SELECT empresa FROM empresa WHERE idempresa = '".$id."'");
                $idpe=$idp[0]['empresa'];
                $persona = Persona::model()->findAllByPk($idpe);
                $person = $persona[0];
                $lugar = new Ubigeo();
                $datos=new Ubigeo();                

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

                $image = array();
                foreach ($_FILES as $value)
                {
                    foreach ($value as $file)
                    {
                        foreach ($file as $archivo)
                        {
                            array_push($image, $archivo);
                        }
                    }
                }
                $namefile='';
                if($image[0]!=''){$namefile = MyController::renombrarArchivo($image);}
                $oculto = $_POST['oculto'];
                                

                $nombrecompleto=$_POST['Persona']['nombre'];
                
		if(isset($_POST['Empresa']))
		{                                               
                        $person->attributes=$_POST['Persona'];

                        $person->ubigeo=UbigeoController::getIdUbigeo($_POST['Ubigeo']['coddpto'], $_POST['city_id'], $_POST['prov_id']);
                        $person->nombrecompleto=$nombrecompleto;
                        
                        if($person->save())
                        {                            
                            $model->attributes=$_POST['Empresa'];
                            
                            if($image[0]!=''){unlink('images/'.$oculto);unlink('images/'.'_'.$oculto);$model->lgo=$namefile;}
                            else{$model->lgo=$oculto;}
                            $model->usuario=(Yii::app()->user->name);

                            if($model->save())
                            {
                                if($image[0]!=''){MyController::subirArchivo($image,'images/',$namefile);}
                                $this->redirect(array('view','id'=>$model->idempresa));
                            }
                        }
		}


		$this->render('update',array(
			'model'=>$model,
                        'person'=>$person,
                        'lugar'=>$lugar,
                        'datos'=>$datos,
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
			//$this->loadModel($id)->delete();
                        
                        $connection=  Yii::app()->db;
                        $sqlStatement="UPDATE empresa SET estado=0 WHERE idempresa='".$id."';";
                        $command=$connection->createCommand($sqlStatement);
                        $command->execute();

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

                $dataProvider=new CActiveDataProvider('Empresa', array(
                        'criteria'=>array(
                                'condition'=>'estado=1',
                                'order'=>'idempresa DESC',
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
		$model=new Empresa('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Empresa']))
			$model->attributes=$_GET['Empresa'];

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
		$model=Empresa::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='empresa-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}