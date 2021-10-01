<?php

class VentaController extends Controller
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
				'actions'=>array('index','view','viewGuia','viewCotizacion','viewNota'),
                                'users'=>array('@'),
                                'expression'=>"{$nivelll}==1 && {$estado}==1 || {$nivelll}==2 && {$estado}==1 ",

			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('admin','create','productos','grabarProductos','adminFacturaVenta','adminBoletaVenta','adminNotaVenta','adminCotizacionVenta'),
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
        public function actionAdminFacturaVenta()
	{
		$model=new Venta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Venta']))
			$model->attributes=$_GET['Venta'];

		$this->render('adminfv',array(
			'model'=>$model,
		));
	}

        public function actionAdminBoletaVenta()
	{
		$model=new Venta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Venta']))
			$model->attributes=$_GET['Venta'];

		$this->render('adminbv',array(
			'model'=>$model,
		));
	}

        public function actionAdminNotaVenta()
	{
		$model=new Venta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Venta']))
			$model->attributes=$_GET['Venta'];

		$this->render('adminnv',array(
			'model'=>$model,
		));
	}

        public function actionAdminCotizacionVenta()
	{
		$model=new Venta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Venta']))
			$model->attributes=$_GET['Venta'];

		$this->render('admincov',array(
			'model'=>$model,
		));
	}
//----------------------------------------------------------------------------------------------------
	public function actionView($id)
	{
                $modelabc=new SaveUsAb;
                $connection=  Yii::app()->db;
                $usera = Yii::app()->user->name;
                $sqlStatement="CALL vista_saveus($id, '$usera');";
                //echo $sqlStatement;
                $command=$connection->createCommand($sqlStatement);
                $command->execute();
                $this->render('view',array(
                        'modelabc'=>$modelabc,
			'model'=>$this->loadModel($id),                        
		));
	}

        public function actionViewGuia()
	{
                GuiaRemisionVenta::insertar_guia_venta_limpiar();
                $model=new GuiaRemisionVenta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['GuiaRemisionVenta']))
			$model->attributes=$_GET['GuiaRemisionVenta'];
		$this->render('listaguia',array(
			'model'=>$model,
		));
	}

         public function actionViewCotizacion()
	{
                GuiaRemisionVenta::insertar_guia_venta_limpiar();
                $model=new Venta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Venta']))
			$model->attributes=$_GET['Venta'];
		$this->render('listacotizacion',array(
			'model'=>$model,
		));
	}

        public function actionViewNota()
	{
                GuiaRemisionVenta::insertar_guia_venta_limpiar();
                $model=new Venta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Venta']))
			$model->attributes=$_GET['Venta'];
		$this->render('listanota',array(
			'model'=>$model,
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
        public static function gettotal()
            {
            $tot = PrecioVentaTmp::model()->findAllBySql("SELECT * FROM precio_venta_tmp WHERE usuario='".Yii::app()->user->name."' LIMIT 1;");
            $total = $tot[0]['total'];
            return $total;
            }

        public static function getsubbtotal()
            {
            $subtot = PrecioVentaTmp::model()->findAllBySql("SELECT * FROM precio_venta_tmp WHERE usuario='".Yii::app()->user->name."' LIMIT 1;");
            $subbtotal = $subtot[0]['sutbotal'];
            return $subbtotal;
            }

        public static function getigv()
            {
            $sigv = PrecioVentaTmp::model()->findAllBySql("SELECT * FROM precio_venta_tmp WHERE usuario='".Yii::app()->user->name."' LIMIT 1;");
            $igv = $sigv[0]['igv'];
            return $igv;
            }

          public static function getdescuento()
            {
            $desc = PrecioVentaTmp::model()->findAllBySql("SELECT * FROM precio_venta_tmp WHERE usuario='".Yii::app()->user->name."' LIMIT 1;");
            $descuento = $desc[0]['descuento'];
            return $descuento;
            }

          public static function numsaveus($usuario,$almacen)
          {
          $sql="SELECT COUNT(*) AS cantidad FROM save_us WHERE almacen=$almacen AND usuario='$usuario' AND accion_save='I'";
          $num = SaveUs::model()->findAllBySql($sql);
          $numsave = $num[0]['cantidad'];
          return $numsave;
          }
          

	public function actionCreate()
	{
		$importguia = $_GET['im'];
                $importcotiza = $_GET['co'];
                $importnota = $_GET['nv'];
                $model=new Venta;
                $SaveUs=new SaveUs();
                $tipodocumento=new TipoDocumento();
                $tipopago=new TipoPago();
                $igv=new Igv();
                $precioVentaTmp = new PrecioVentaTmp();
                $usuarioo = Yii::app()->user->name;
                $almacenn = (int)MyModel::getIdAlmacen();
                $tipodoc=$_GET['t'];
                $numeross = VentaController::numsaveus($usuarioo, $almacenn);
                
                 if($numeross==0)
                 {
                    if($importguia<>'')
                    {
                     GuiaRemisionVenta::insertar_guia_venta_importar($importguia);
                    }

                    if($importcotiza<>'')
                    {
                    Venta::insertar_cotizacion_importar($importcotiza);
                    }

                    if($importnota<>'')
                    {
                    Venta::insertar_cotizacion_importar($importnota);
                    }
                /*if( $_COOKIE['ejecucion']!='ya' )
                {
                GuiaRemisionVenta::insertar_guia_venta_importar($importguia);
                }
                setcookie("ejecucion","ya");*/
                }
		if(isset($_POST['Venta']))
		{
                    $model->attributes=$_POST['Venta'];
                    $model->idcliente=Venta::getCodCli($_POST['Venta']['idcliente']);
                    $model->importe_total=VentaController::gettotal();
                    $model->subtotal=VentaController::getsubbtotal();
                    $model->igv=VentaController::getigv();
                    $model->descuento=VentaController::getdescuento();
                    $model->almacen=(int)MyModel::getIdAlmacen();
                    if($model->save())
                    {
                        
                        $idVenta = (int)$model->idventa;                        

                        $connection=  Yii::app()->db;
                        $sqlStatement="CALL _cursor_LlenarDetalleSerieVenta('$usuarioo', $almacenn, $idVenta);";
                        $command=$connection->createCommand($sqlStatement);
                        $command->execute();

                        $this->redirect(array('view','id'=>$model->idventa));
                    }
		}

		$this->render('create',array(
                    'model'=>$model,
                    'tipodocumento'=>$tipodocumento,
                    'tipopago'=>$tipopago,
                    'SaveUs'=>$SaveUs,
                    'precioVentaTmp'=>$precioVentaTmp,
                    'tipodoc'=>$tipodoc,
                    'importguia'=>$importguia,
                    'importcotiza'=>$importcotiza,
                    'importnota'=>$importnota,
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
                $tipodocumento=new TipoDocumento();
                 $tipopago=new TipoPago();
                $igv=new Igv();


                 $tipodoc=$_POST['TipoDocumento']['idtipo_documento'];
                $model->idtipo_documento=(int)$tipodoc;
                $tipopag=$_POST['TipoPago']['idtipo_pago'];
                $model->idtipo_pago=(int)$tipopag;

                // Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Venta']))
		{
			$model->attributes=$_POST['Venta'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->idventa));
		}

		$this->render('update',array(
                    'model'=>$model,
                    'tipodocumento'=>$tipodocumento,
                    'tipopago'=>$tipopago,

		));
	}

       /*  public function actionProductos()
         {
             $modelProducto = new Producto();
             $this->renderPartial('_productos',array('modelProducto'=>$modelProducto),false,true);
         }

         public function actionGrabarProductos()
         {
             $modelProducto = new Producto();
             $model = new SaveUs();
             $idProducto = $_GET['id'];
             $activar = $_GET['activar'];
             $producto = Producto::model()->findByPk($idProducto);
             $this->renderPartial('_productos',array('modelProducto'=>$modelProducto,'producto'=>$producto,'activar'=>$activar,'model'=>$model),false,true);
         }*/



//
//        public function actionUpdate($id)
//        {
//                $model=$this->loadModel($id);
//                $status = null;
//                $this->layout = '//layouts/column1';
//                // Uncomment the following line if AJAX validation is needed
//                // $this->performAjaxValidation($model);
//                $states = array('accepted','scheduled','rejected','on-hold');
//                foreach($states as $state){
//                   if($model->swGetStatus()->getLabel() == $state)
//                   {
//                           $status = 1;
//                           break;
//                   }
//                }
//
//
//                if(MyUtils::abstractOwner($model->id) && $status == 1)
//                {
//                 Yii::app()->user->setFlash('restricted','You are no longer allowed to edit this abstract.');
//                 $this->redirect(array('view','id'=>$model->id));
//                }
//                if(isset($_POST['EventAbstract']))
//                {
//                        $model->attributes=$_POST['EventAbstract'];
//                        $keywordArray = (!isset($_POST['keywordArray']) ? array() : $_POST['keywordArray']);
//                        $this->setKeywords($model,'keywords',$keywordArray);
//                        $this->setAuthorField($model,$_POST['authorName'],$_POST['authorAffiliation'],$_POST['authorAffiliationLocation'],$_POST['authorRole'],$_POST['authorStudent']);                       if($model->save())
//                                $this->redirect(array('view','id'=>$model->id));
//                }
//
//                $this->render('update',array(
//                        'model'=>$model,
//                ));
//        }
//
//
//
//
//           public function setKeywords($model,$field,$keys)
//        {
//
//            foreach(array_keys($keys) as $key)
//                 {
//                   if (strlen($keys[$key]) < 1)
//                     {
//                       unset($keys[$key]); //  take it out of the array
//                     }
//                 }
//           $model->$field = (empty($keys) ? null : implode(',',$keys));
//        }
//
//
//
//        public function getKeywords($delimited)
//        {
//                $keys = explode(',',$delimited);
//                return $keys;
//        }
//









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

                $dataProvider=new CActiveDataProvider('Venta', array(
                        'criteria'=>array(
                                'order'=>'idventa DESC',
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
		$model=new Venta('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Venta']))
			$model->attributes=$_GET['Venta'];

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
		$model=Venta::model()->findByPk((int)$id);
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
		if(isset($_POST['ajax']) && $_POST['ajax']==='venta-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
