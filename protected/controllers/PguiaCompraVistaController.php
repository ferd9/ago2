<?php

class PguiaCompraVistaController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column3';

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
                //abcacs
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
                                'users'=>array('@'),
                                'expression'=>"{$nivelll}==1 && {$estado}==1 || {$nivelll}==2 && {$estado}==1 ",

			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('admin','create','productos','grabarProductos'),
                                'users'=>array('@'),
				'expression'=>"{$nivelll}==1 && {$estado}==1 || {$nivelll}==2 && {$estado}==1 || {$nivelll}==3 && {$estado}==1",
			),

                        array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
                                'users'=>array('@'),
				'expression'=>"{$nivelll}==1 && {$estado}==1",
			),

			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete','productos'),
                                'users'=>array('@'),
				'expression'=>"{$nivelll}==1 && {$estado}==1",
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
		$model=new PguiaCompraVista;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['PguiaCompraVista']))
		{
			$model->attributes=$_POST['PguiaCompraVista'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idplana));
		}

		$this->render('create',array(
			'model'=>$model,
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

		if(isset($_POST['PguiaCompraVista']))
		{
			$model->attributes=$_POST['PguiaCompraVista'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idplana));
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
		$dataProvider=new CActiveDataProvider('PguiaCompraVista');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PguiaCompraVista('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PguiaCompraVista']))
			$model->attributes=$_GET['PguiaCompraVista'];

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
		$model=PguiaCompraVista::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='pguia-compra-vista-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
