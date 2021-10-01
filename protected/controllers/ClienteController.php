<?php

class ClienteController extends Controller
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
	{       $nivelll=Yii::app()->user->getId();
                $usernivel=Yii::app()->user->name;
                $user2=Yii::app()->user->isGuest;
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('@'),
                                'expression'=>"{$nivelll}==1 || {$nivelll}==2",
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','Addnew'),
                                'users'=>array('@'),
				'expression'=>"{$nivelll}==1 || {$nivelll}==2 || {$nivelll}==3",
			),

                         array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
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

        public function actionOpciones()
        {
            $idtipcc=$_POST['iddtc'];
                if($idtipcc==1)
                {
		$this->redirect(array('_form','idtipo_cliente'=>$idtipcc));
                }
                elseif($idtipcc==2)
                {
		$this->redirect(array('_form2','idtipo_cliente'=>$idtipcc));
                }
        }



      
	public function actionCreate()
	{
		$model=new Cliente;
                $tipocliente=new TipoCliente;
                $persona = new Persona();
                $ubigeo=new Ubigeo;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
 		if(isset($_POST['Cliente']))
		{

                    $persona->ubigeo=UbigeoController::getIdUbigeo($_POST['Ubigeo']['coddpto'], $_POST['city_id'], $_POST['prov_id']);
                    $nombrecompletito=$_POST['Persona']['nombre'].' '.$_POST['Persona']['apaterno'].' '.$_POST['Persona']['amaterno'];
                    $persona->nombrecompleto=$nombrecompletito;

                

			$persona->attributes=$_POST['Persona'];
			if($persona->save())
                        {
                            $model->cliente=PersonaController::getIdPersona($nombrecompletito);

                            

                            $model->attributes=$_POST['Cliente'];
                            if($model->save())
				$this->redirect(array('view','id'=>$model->idcliente));
                        }




		}

		$this->render('create',array(
			'model'=>$model,
                        'tipocliente'=>$tipocliente,
                        'persona'=>$persona,
                        'ubigeo'=>$ubigeo,
		));
	}

        public function actionAddnew() {
         $model=new Cliente();
        // Ajax Validation enabled
        $this->performAjaxValidation($model);
        // Flag to know if we will render the form or try to add
        // new jon.
                $flag=true;
        if(isset($_POST['Cliente']))
        {       $flag=false;
            $model->attributes=$_POST['Cliente'];

            if($model->save()) {
                //Return an <option> and select it
                            echo CHtml::tag('option',array ('value'=>$model->idcliente,'selected'=>true),CHtml::encode($model->cliente),true);
                                }
                }
                if($flag) {
                    $this->renderPartial('createDialog',array('model'=>$model,),false,true);
                }
        }


	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
                $tipocliente=new TipoCliente;
                $id=Cliente::model()->findAllBySql("SELECT cliente FROM cliente WHERE idcliente = '".$id."'");
                $idcod=$id[0]['cliente'];
                $idper=Persona::model()->findAllByPk($idcod);
                $persona=$idper[0];

                $ubigeo=new Ubigeo;
                $tipoccc = $model->idtipo_cliente;
               // echo $model->idtipo_cliente;
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

                if(isset($_POST['Cliente']))
		{

                    $persona->ubigeo=UbigeoController::getIdUbigeo($_POST['Ubigeo']['coddpto'], $_POST['city_id'], $_POST['prov_id']);
                    $nombrecompletito=$_POST['Persona']['nombre'].' '.$_POST['Persona']['apaterno'].' '.$_POST['Persona']['amaterno'];
                    $persona->nombrecompleto=$nombrecompletito;
			$persona->attributes=$_POST['Persona'];
			if($persona->save())
                        {
                            $model->cliente=PersonaController::getIdPersona($nombrecompletito);
                            $model->attributes=$_POST['Cliente'];
                            if($model->save())
				$this->redirect(array('view','id'=>$model->idcliente));
                        }
		}

		$this->render('update',array(
			'model'=>$model,
                        'tipoccc'=>$tipoccc,
                        'tipocliente'=>$tipocliente,
                        'persona'=>$persona,
                        'ubigeo'=>$ubigeo,
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
			// $this->loadModel($id)->delete();
                        $connection=  Yii::app()->db;
                        $sqlStatement="update cliente set estado=0 where idcliente = '".$id."';";
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
                $dataProvider=new CActiveDataProvider('Cliente', array(
                        'criteria'=>array(
                                'condition'=>'estado=1',
                                'order'=>'idcliente DESC',
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
		$model=new Cliente('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Cliente']))
			$model->attributes=$_GET['Cliente'];

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
		$model=Cliente::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='cliente-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}

        public static function getIdCliente($nompersona)
        {
            $idpersona = PersonaController::getIdPersona($nompersona);
            $codcli = Cliente::model()->findAllBySql("SELECT idcliente FROM cliente WHERE cliente='".$idpersona."';");
            $codcliente = $codcli[count($codcli)-1]['idcliente'];
            return $codcliente;
        }
}
