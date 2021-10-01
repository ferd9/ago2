<?php

class TmptransSaveController extends Controller
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

        public static function getidplanasave($idproducto)
        {         
                $dir = TmptransSave::model()->findAllBySql("SELECT idtmptras FROM _tmptrans_save WHERE idproducto='".$idproducto."' LIMIT 1;");
                $dirDest = $dir[0]['idtmptras'];
                return $dirDest;
        }

        public static function getstockplanasave($idplanasave)
        {
                $dir = TmptransSave::model()->findAllBySql("SELECT stockproducto FROM _tmptrans_save WHERE idtmptras='".$idplanasave."' LIMIT 1;");
                $dirDest = $dir[0]['stockproducto'];
                return $dirDest;
        }

	public function actionCreate()
	{
		$model=new TmptransSave;
                $idplana = $_GET['id'];
                $tmptrans= new Tmptrans();
                $mjs="";
                $tmp = Tmptrans::model()->findByPk((int)$idplana);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['TmptransSave']))
		{
			$model->attributes=$_POST['TmptransSave'];
                        $idproducto = $tmp->idproducto;
                        $idplanasave = TmptransSaveController::getidplanasave($idproducto);
                        $stockactual = $tmp->stockproducto;
                        $stockingresado = $_POST['TmptransSave']['stockproducto'];
                        if($stockactual>=$stockingresado)
                        {
                            if($idplanasave<>0)
                            {
                                $stockplanasave = TmptransSaveController::getstockplanasave($idplanasave);
                                $cantidadactualizar = $stockplanasave+$stockingresado;
                               if($stockactual>=$cantidadactualizar)
                                    {
                                    $connection=  Yii::app()->db;
                                    $sqlStatement="update _tmptrans_save set stockproducto='".$cantidadactualizar."' where idtmptras='".$idplanasave."';";
                                    $command=$connection->createCommand($sqlStatement);
                                    $command->execute();
                                    $this->redirect(array('tmptrans/admin'));
                                    }
                                    else
                                    {
                                    $mjs = "Producto seleccionado con stock: ".$stockplanasave." + la cantidad ingresada: ".$stockingresado." = ".$cantidadactualizar." <br>Es mayor al stock: ".$stockactual.". Porfavor ingresar una cantidad menor...";
                                    }
                            }
                            else
                            {
                                if($model->save())
                                $this->redirect(array('tmptrans/admin'));
                            }
                        }
                        else
                        {
                         $mjs = "La cantidad ingresada: ".$stockingresado." es mayor al stock: ".$stockactual.". Porfavor ingresar una cantidad menor...";
                        }
		}

		$this->render('create',array(
			'model'=>$model,
                        'tmp'=>$tmp,
                        'mjs'=>$mjs,
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

		if(isset($_POST['TmptransSave']))
		{
			$model->attributes=$_POST['TmptransSave'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idtmptras));
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
		$dataProvider=new CActiveDataProvider('TmptransSave');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new TmptransSave('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['TmptransSave']))
			$model->attributes=$_GET['TmptransSave'];

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
		$model=TmptransSave::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='tmptrans-save-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
