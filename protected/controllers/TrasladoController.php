<?php

class TrasladoController extends Controller
{

	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}

	public function accessRules()
	{       $nivelll=Yii::app()->user->getId();
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','datatraslado','grabatraslado','admin'),
				'users'=>array('@'),
                                'expression'=>"{$nivelll}==1",
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	public function actionIndex()
	{
                $nomalmacen = Almacen::getAlmacen();
                $idalmacen = MyModel::getIdAlmacen();               
		$this->render('index',array(
                        'nomalmacen'=>$nomalmacen,
                        'idalmacen'=>$idalmacen,
		));
	}


        public function actionAdmin()
	{
                $model=new MovimientoAlmacen('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['MovimientoAlmacen']))
			$model->attributes=$_GET['MovimientoAlmacen'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

        public function actionDatatraslado()
	{
                $tipo=$_GET['tipoa'];
                $tmptransSave= new TmptransSave();
                $nombrealmcen2=Almacen::getnombreAlmacen($tipo);
                //echo $tipo;
                $connection=  Yii::app()->db;
                $sqlStatement="CALL __tmp_trans_llenado($tipo);";
                //echo $sqlStatement;
                $command=$connection->createCommand($sqlStatement);
                $command->execute();
		$this->render('traslado',array(
                        'tipo'=>$tipo,
                        'nombrealmcen2'=>$nombrealmcen2,
                        'tmptransSave'=>$tmptransSave,
		));
	}


        public function actionGrabatraslado()
	{
                $nomalmacen = Almacen::getAlmacen();
                $idalmacen = MyModel::getIdAlmacen();
                $user=Yii::app()->user->name;
                //-- -------------------------------------
                $idalmacenafter=$_GET['idalmacen'];
                $idalmacenseleccionado=$_GET['tipob'];
                $motivotraslado=$_GET['observaciones'];
                $codven = MyController::renombrarArchivoabc($idalmacenseleccionado);

               // echo $idalmacenafter."<br>";
                //echo $idalmacenseleccionado."<br>";
               // echo $motivotraslado."<br>";
               // echo $codven."<br>";
                $connection=  Yii::app()->db;
                $sqlStatement="CALL __tmptransultimo_llenado($idalmacenseleccionado,$codven,'$motivotraslado',$idalmacenafter,'$user');";
               // echo $sqlStatement;
                $command=$connection->createCommand($sqlStatement);
                $command->execute();
		 $this->redirect(array('index'));
		/*$this->render('index',array(
                        'nomalmacen'=>$nomalmacen,
                        'idalmacen'=>$idalmacen,
		));*/
	}

}