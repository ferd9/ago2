<?php

class SoporteController extends Controller
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
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('@'),
                                'expression'=>"{$nivelll}==1 || {$nivelll}==3",
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update','createabc'),
				'users'=>array('@'),
                                'expression'=>"{$nivelll}==1 || {$nivelll}==3",
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin'),
				'users'=>array('@'),
                                'expression'=>"{$nivelll}==1 || {$nivelll}==3",
			),

                        array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('delete'),
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

         public function getidVent($id)
        {
            $idab = Venta::model()->findAllBySql("SELECT * FROM venta,garantia WHERE idsoporte = '".$id."'");
            $idnumdocven = $idab[count($idab)-1]['idventa'];
            return $idnumdocven;
        }


        public function getnume($idvn)
        {
        $idcod;
        $idmm = new CDbCriteria;
        $idmm->condition = "idventa = '".$idvn."'";
        $listv = CHtml::listData(Venta::model()->findAll($idmm),'numero_documento','numero_documento');
        foreach($listv as $clave=>$valor)
        {
            $idcod=$valor;
        }
        return $idcod;
        }

         public function getgarantia($idvn)
        {
        $idcod;
        $idmm = new CDbCriteria;
        $idmm->condition = "idventa = '".$idvn."'";
        $listv = CHtml::listData(DetalleVenta::model()->findAll($idmm),'garantia','garantia');
        foreach($listv as $clave=>$valor)
        {
            $idcod=$valor;
        }
        return $idcod;
        }
        
        /*-------------------------------------------------------------------*/
        public function getfechrepGarant($id)
        {
            $idabc = Garantia::model()->findAllBySql("SELECT * FROM garantia WHERE idsoporte = '".$id."'");
            $fechrecp = $idabc[count($idabc)-1]['fecha_recepcion'];
            return $fechrecp;
        }

        public function getfechentregaGarant($id)
        {
            $idabcd = Garantia::model()->findAllBySql("SELECT * FROM garantia WHERE idsoporte = '".$id."'");
            $fechentreg = $idabcd[count($idabcd)-1]['fecha_entrega'];
            return $fechentreg;
        }

        public function getobservaGarant($id)
        {
            $idabcde = Garantia::model()->findAllBySql("SELECT * FROM garantia WHERE idsoporte = '".$id."'");
            $observa = $idabcde[count($idabcde)-1]['observacion'];
            return $observa;
        }
        
	public function actionView($id)
	{
                $garantia=new Garantia ();
                $accesoriosSoporte = new AccesoriosSoporte;

                $idvn = SoporteController::getidVent($id);
                //echo  $idvn;
                $docvent=  SoporteController::getnume($idvn);
                //echo $docvent;
                $garant = SoporteController::getgarantia($idvn)."  / meses";
                //-------------------------------------------------------------------
                $fechrecp = SoporteController::getfechrepGarant($id);
                $fechentrega = SoporteController::getfechentregaGarant($id);
                $observaciongarantia = SoporteController::getobservaGarant($id);

                $connection=  Yii::app()->db;
                $sqlStatement="CALL vista_accesorios_soporte($id);";
                // echo $sqlStatement;
                $command=$connection->createCommand($sqlStatement);
                $command->execute();

                $this->render('view',array(
                        'garantia'=>$garantia,
                        'docvent'=>$docvent,
                        'garant'=>$garant,
                        'fechrecp'=>$fechrecp,
                        'fechentrega'=>$fechentrega,
                        'observaciongarantia'=>$observaciongarantia,
                        'accesoriosSoporte'=>$accesoriosSoporte,
			'model'=>$this->loadModel($id),
                        
		));
	}
	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
        public function getIdCliente($idpersona)
        {
            $idcl = Cliente::model()->findAllBySql("SELECT idcliente FROM cliente WHERE cliente = '".$idpersona."'");
            $idcliente = $idcl[count($idcl)-1]['idcliente'];
            return $idcliente;
        }
        public function getIdVenta($numeventa)
        {
            $idv = Venta::model()->findAllBySql("SELECT idventa FROM venta WHERE numero_documento = '".$numeventa."'");
            $idvent = $idv[count($idv)-1]['idventa'];
            return $idvent;
        }
	public function actionCreate()
	{
		$model=new Soporte;
                $persona=new Persona ();
                $cliente=new Cliente;
                $garantia=new Garantia ();
                $accesoriosSoporte = new AccesoriosSoporte;
                $venta=new Venta;
                $detalle_venta=new DetalleVenta;
                $accesorios = new Accesorios();
                $detalleaccesorios = new DetalleAccesorios();
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $nomperson=$_POST['Soporte']['idcliente'];
                $idpersona=  PersonaController::getIdPersona($nomperson);
                //------------------------------------------------------------
                $userr=$_POST['Soporte']['usuario'];
                $numeventa=$_POST['Garantia']['idventa'];
                $tipoaten=$_POST['Soporte']['tipo_atencion'];
                $fechaingre=$_POST['Soporte']['fecha_ingreso_soporte'];
                $fechasalida=$_POST['Soporte']['fecha_salida_producto'];
                $oserba=$_POST['Soporte']['observaciones'];

                if($tipoaten=="g")
		{

                if(isset($_POST['Soporte']))
                {
                        $model->attributes=$_POST['Soporte'];
                        $model->idcliente=SoporteController::getIdCliente($idpersona);
			if($model->save())
                        {    
                            $garantia->attributes=$_POST['Garantia'];
                            $garantia->idsoporte=$model->idsoporte;
                            $garantia->usuario=$userr;
                            $garantia->observacion=$oserba;
                            $garantia->fecha_recepcion=$fechaingre;
                            $garantia->fecha_entrega=$fechasalida;
                            $garantia->idventa=SoporteController::getIdVenta($numeventa);;
                            if($garantia->save())
                            {                                   
                                $connection=  Yii::app()->db;
                                $codsoporte=(int)$model->idsoporte;
                                $sqlStatement="CALL daraccesoriosydetalle($codsoporte,'$userr');";
                               // echo $sqlStatement;
                                $command=$connection->createCommand($sqlStatement);
                                $command->execute();
                                $this->redirect(array('view','id'=>$model->idsoporte));
                            }
                            }
                        }
		}

                elseif($tipoaten=="s")
                {
                    if(isset($_POST['Soporte']))
                    {
                        $model->attributes=$_POST['Soporte'];
                        $model->idcliente=SoporteController::getIdCliente($idpersona);
			if($model->save())
                        {

                            if($numeventa=="")
                            {
                                $connection=  Yii::app()->db;
                                $codsoporte=(int)$model->idsoporte;
                                $sqlStatement="CALL daraccesoriosydetalle($codsoporte,'$userr');";
                               // echo $sqlStatement;
                                $command=$connection->createCommand($sqlStatement);
                                $command->execute();
                                $this->redirect(array('view','id'=>$model->idsoporte));
                            }
                            else
                            {
                            $garantia->attributes=$_POST['Garantia'];
                            $garantia->idsoporte=$model->idsoporte;
                            $garantia->usuario=$userr;
                            $garantia->observacion=$oserba;
                            $garantia->fecha_recepcion=$fechaingre;
                            $garantia->fecha_entrega=$fechasalida;
                            $garantia->idventa=SoporteController::getIdVenta($numeventa);;
                            if($garantia->save())
                            {
                                $connection=  Yii::app()->db;
                                $codsoporte=(int)$model->idsoporte;
                                $sqlStatement="CALL daraccesoriosydetalle($codsoporte,'$userr');";
                               // echo $sqlStatement;
                                $command=$connection->createCommand($sqlStatement);
                                $command->execute();
                                $this->redirect(array('view','id'=>$model->idsoporte));

                            }
                            }
                        }
                    }
                }
 
		$this->render('create',array(
			'model'=>$model,
                        'cliente'=>$cliente,
                        'garantia'=>$garantia,
                        'venta'=>$venta,
                        'detalle_venta'=>$detalle_venta,
                        'accesoriosSoporte'=>$accesoriosSoporte,

		));
	}

        public function actionCreateabc()
	{
		 $accesoriosSoporte = new AccesoriosSoporte;
                $this->render('_accesoporte',array(
			'accesoriosSoporte'=>$accesoriosSoporte,
		));
	}

        public static function getVenta()
        {
            $numProve = array();
            $criterioBusqueda = new CDbCriteria;
            //empleado  INNER JOIN departamento   ON empleado.IDdepartamento = departamento.IDdepartamento

            //$criterioBusqueda->join = 'proveedor.proveedor = persona.idpersona';
             $listaClientes = Venta::model()->findAllBySql("SELECT * FROM venta");
             $atmp = CHtml::listData($listaClientes,'idventa','numero_documento');
             $count = 0;
             foreach($atmp as $key=>$values)
             {
                 $numProve[$count] = $values;
                 $count++;
             }
             return  $numProve;

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

		if(isset($_POST['Soporte']))
		{
			$model->attributes=$_POST['Soporte'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idsoporte));
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
                $dataProvider=new CActiveDataProvider('Soporte', array(
                        'criteria'=>array(
                                'order'=>'idsoporte DESC',
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
		$model=new Soporte('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Soporte']))
			$model->attributes=$_GET['Soporte'];

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
		$model=Soporte::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='soporte-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
