<?php

class UsuarioController extends Controller
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
                                'expression'=>"{$nivelll}==1",
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
			'model'=>$this->loadModel((string)$id),
		));


	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Usuario;
                $persona = new Persona();
                $almacen = new Almacen();
                $nivel = new Nivel();
                $lugar = new Ubigeo();
		
                $prov = explode(",", $_POST['city_id']);
                $pr = $prov[1];

                $depar = new CDbCriteria;
                $depar->condition = "coddpto = '".$_POST['Ubigeo']['coddpto']."' and codprov = '".$prov[0]."' and coddist = '".$_POST['prov_id']."'";
                $listDepar = CHtml::listData(Ubigeo::model()->findAll($depar),'idubigeo','idubigeo');

                foreach($listDepar as $clave=>$valor){
                         //echo $clave."<======>".$valor;

                         $persona->ubigeo=$valor;
                     }

                 $nivelad=$_POST['Nivel']['idnivel'];
                 $model->nivel=(int)$nivelad;

                 $almacenad=$_POST['Almacen']['idalmacen'];
                 $model->almacen=(int)$almacenad;

		if(isset($_POST['Usuario']))
		{
                     $nombrecompletito=$_POST['Persona']['nombre'].' '.$_POST['Persona']['apaterno'].' '.$_POST['Persona']['amaterno'];
                     $persona->nombrecompleto=$nombrecompletito;
                     $persona->attributes=$_POST['Persona'];
                        if($persona->save()){
                            $idper = Persona::model()->findAllBySql("select idpersona from persona where nombre = '".$_POST['Persona']['nombre']."'");

                            //echo count($idper)." cojtador";
                            $model->usuario = $idper[count($idper)-1]['idpersona'];
			$model->attributes=$_POST['Usuario'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->login));
		}
                }
		$this->render('create',array(
			'model'=>$model,
                        'persona'=>$persona,
                        'almacen'=>$almacen,
                        'nivel'=>$nivel,
                        'lugar'=>$lugar,
		));
	}

        public function getCodUbigeo($coddep,$codprov,$coddist)
        {
                    $lugar = new Ubigeo();
                     $depar = new CDbCriteria;

                     $depar->condition = "coddpto = '".$coddep."' and codprov = '".$codprov."' and coddist = '".$coddist."'";
                    // $depar->select = 'idubigeo';
                     $listDepar = CHtml::listData(Ubigeo::model()->findAll($depar),'idubigeo','idubigeo');
                     return $listDepar;
        }
  // funcione para drodownlist enlazados
        public function actionProvincia()
    {
            $prov = new CDbCriteria;
            $prov->order = 'nombre asc';
            $prov->group = 'codprov';
            $prov->condition = 'coddpto = '.$_POST['Ubigeo']['coddpto'].' AND codprov<>00';
            $datosUbigeo = new Ubigeo;


            $data = $datosUbigeo->findAll($prov);

          echo CHtml::tag('option',array('value' => '0,0'),CHtml::encode('Seleccionar'),true);
        $data = CHtml::listData($data,'codprov','nombre');
            foreach($data as $id => $value)
            {
                echo CHtml::tag('option',array('value' => $id.','.$_POST['Ubigeo']['coddpto']),CHtml::encode($value),true);

            }

    }

    public function actionDistrito(){

            $dist = new CDbCriteria;
            $dist->order = 'nombre asc';
            $dist->group = 'coddist';
            $provDepar = explode(",", $_POST['city_id']);
            $codpro = $provDepar[0];
            $coddepar = $provDepar[1];
            $dist->condition = 'coddpto = '.$coddepar.' AND codprov='.$codpro.' AND coddist<>00';

            $datosUbigeo = new Ubigeo;
           $data = $datosUbigeo->findAll($dist);
           $data = CHtml::listData($data,'coddist','nombre');

            if(($_POST['city_id']=='0,0') || ($_POST['Ubigeo']['coddpto']=='0'))
            {
                    echo CHtml::tag('option',array('value' => '00'),CHtml::encode('Seleccionar'),true);
            }else{

                 foreach($data as $id => $value)
                {
                    echo CHtml::tag('option',array('value' => $id),CHtml::encode($value),true);
                 }
            }
    }

    public function actionLimpiar(){
        echo CHtml::tag('option',array('value' => '00'),CHtml::encode('Selddd'),true);
    }

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);
                $nivel = new Persona();
                $almacen = new Almacen();
                $nivel = new Nivel();
                $lugar = new Ubigeo();
                $nivelito = $model->nivel;
                $almacenito = $model->almacen;
                //$idp=Usuario::model()->findAllBySql("SELECT usuario,nivel,almacen FROM usuario WHERE login = '".$id."'");
                $idp=Usuario::model()->findByAttributes(array('login'=>$id));
                $idpe=$idp->usuario;
                $personaa = Persona::model()->findAllByPk($idpe);
                $persona = $personaa[0];
               // $idp=$_REQUEST["idp"];
               // print_r($idp);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

                $prov = explode(",", $_POST['city_id']);
                $pr = $prov[1];

                $depar = new CDbCriteria;
                $depar->condition = "coddpto = '".$_POST['Ubigeo']['coddpto']."' and codprov = '".$prov[0]."' and coddist = '".$_POST['prov_id']."'";
                $listDepar = CHtml::listData(Ubigeo::model()->findAll($depar),'idubigeo','idubigeo');

                foreach($listDepar as $clave=>$valor){
                         //echo $clave."<======>".$valor;

                         $persona->ubigeo=$valor;
                     }

                 $nivelad=$_POST['Nivel']['idnivel'];
                 $model->nivel=(int)$nivelad;

                 $almacenad=$_POST['Almacen']['idalmacen'];
                 $model->almacen=(int)$almacenad;

		if(isset($_POST['Usuario']))
		{
                    $persona->attributes=$_POST['Persona'];
                        if($persona->save())
                        {
			$model->attributes=$_POST['Usuario'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->login));
		}
                }
		$this->render('update',array(
			'model'=>$model,
                        'persona'=>$persona,
                        'almacen'=>$almacen,
                        'nivel'=>$nivel,
                        'lugar'=>$lugar,
                        'nivelito'=>$nivelito,
                        'almacenito'=>$almacenito,
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
                        $sqlStatement="update usuario set estado=0 where login = '".$id."';";
                        $command=$connection->createCommand($sqlStatement);
                        $command->execute();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Solicitud no válida. Por favor, no repita esta solicitud de nuevo.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
                $dataProvider=new CActiveDataProvider('Usuario', array(
                        'criteria'=>array(
                                'condition'=>'estado=1',
                                'order'=>'nivel asc',
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
		$model=new Usuario('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Usuario']))
			$model->attributes=$_GET['Usuario'];

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
		$model=Usuario::model()->findByPk((string)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='usuario-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
