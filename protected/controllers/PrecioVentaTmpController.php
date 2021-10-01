<?php

class PrecioVentaTmpController extends Controller
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
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update'),
				'users'=>array('*'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('*'),
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
	public function actionView()
	{
                $id = Yii::app()->user->name;
                echo $id;
		$this->render('view',array(
			'model'=>$this->loadModel(),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */

	public function actionCreate()
	{
		$model=new PrecioVentaTmp;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
               
		if(isset($_POST['PrecioVentaTmp']))
		{
			$model->attributes=$_POST['PrecioVentaTmp'];

                                $descuento = $_POST['PrecioVentaTmp']['descuento'];
                                $totalab = MyModel::getSuma();
                                $porcentajetotal = $totalab - ($totalab*0.8);
                                $total = $totalab - $descuento;
                                $mensaje="";
                                if($porcentajetotal<$total)
                                {
                                    $mensaje="El descuento es mayor al establecido....!!";
                                }
                                $Subt = MyModel::getSubTotal($total);
                                $SubTotal = MyModel::getRedondear($Subt);
                                $ig = MyModel::getIgvMonto($total);
                                $igv = MyModel::getRedondear($ig);
                                $connection=  Yii::app()->db;
                                $usera = Yii::app()->user->name;
                                $sqlStatement="CALL s_descuento_precio_venta('$usera',$total,$SubTotal,$igv,$descuento);";
                                //echo $sqlStatement;
                                $command=$connection->createCommand($sqlStatement);
                                if($command->execute())

                                $this->render('create',array(
                                'model'=>$model,'mensaje'=>$mensaje,
                                ));

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

		if(isset($_POST['PrecioVentaTmp']))
		{
			$model->attributes=$_POST['PrecioVentaTmp'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->usuario));
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
		$dataProvider=new CActiveDataProvider('PrecioVentaTmp');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new PrecioVentaTmp('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['PrecioVentaTmp']))
			$model->attributes=$_GET['PrecioVentaTmp'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel()
	{
		$id = Yii::app()->user->name;
                $model=PrecioVentaTmp::model()->findByPk((string)Yii::app()->user->name);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='precio-venta-tmp-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
