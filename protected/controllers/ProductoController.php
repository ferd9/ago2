<?php

class ProductoController extends Controller
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
				'actions'=>array('create','Addnew','marcas','modelo','BatchUpdate'),
                                'users'=>array('@'),
				'expression'=>"{$nivelll}==1 || {$nivelll}==2",
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
        public static function verproveedor($id)
        {
            $prov = ProductoProveedor::model()->findAllBySql("SELECT proveedor FROM producto_proveedor WHERE producto=$id limit 1;");
            $Proveedor = $prov[0]['proveedor'];
            return $Proveedor;
        }

        public static function contadorproveproduc($id)
        {
            $prov = ProductoProveedor::model()->findAllBySql("SELECT producto FROM producto_proveedor WHERE producto=$id LIMIT 1;");
            $Proveedor = $prov[0]['producto'];
            return $Proveedor;
        }

  
	public function actionView($id)
	{
                $fcont=ProductoController::contadorproveproduc($id);
                if($fcont<>0)
                {
                    $idprove = ProductoController::verproveedor($id);
                    $proveedor = Proveedor::nombProveedor($idprove);
                }
                else
                {
                    $proveedor="";
                }
                $this->render('view',array(
                        'proveedor'=>$proveedor,
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */


	public function actionCreate()
	{
		$model=new Producto;
                $tipomoneda=new TipoMoneda;
                $igv=new Igv;
                $proveedor = new Proveedor();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $idproveedor=MyModel::getExplode($_POST['idproveedor']);
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
                

                $igvad=$_POST['Igv']['idigv'];
                $model->idigv=(int)$igvad;
                $tipomonedad=$_POST['TipoMoneda']['idtipo_moneda'];
                $model->idtipo_moneda=(int)$tipomonedad;

		if(isset($_POST['Producto']))
		{
			$model->attributes=$_POST['Producto'];
                        $model->foto=$namefile;
			if($model->save())
                        {
                            if($image[0]!=''){MyController::subirArchivo($image,'images/',$namefile);}

                            if($idproveedor!='')
                            {
                            $connection=  Yii::app()->db;
                            $sqlStatement="call __producto_proveedor($idproveedor,$model->idproducto);";
                            $command=$connection->createCommand($sqlStatement);
                            $command->execute();
                            }
                            $this->redirect(array('view','id'=>$model->idproducto));
                        }
		}

          
//
		$this->render('create',array(

                        'igv'=>$igv,
                        'tipomoneda'=>$tipomoneda,
                        'model'=>$model,
                        'proveedor'=>$proveedor,
//                        'lista_categoria'=>$lista_categoria,
//                         'categoria'=>$categoria,
//                         'marca'=>$marca,
//                        'modelo'=>$modelo,
                       

//
		));
	}


        public function actionIndex()
	{

                $dataProvider=new CActiveDataProvider('Producto', array(
                        'criteria'=>array(
                                'order'=>'idproducto DESC',
                                ),
                ));
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}


        public function actionAdmin()
	{
		$model=new Producto('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Producto']))
			$model->attributes=$_GET['Producto'];

		$this->render('admin',array(
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
        //$model=$this->loadModel($id);
               $fcont=ProductoController::contadorproveproduc($id);
                if($fcont<>0)
                {
                    $idprove = ProductoController::verproveedor($id);
                    $proveedor = Proveedor::nombProveedor($idprove);
                }
                else
                {
                    $proveedor="";
                }
                $igv=new Igv;
                $tipomoneda=new TipoMoneda;

                // Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
                $idproveedor=MyModel::getExplode($_POST['idproveedor']);
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


                $igvad=$_POST['Igv']['idigv'];
                $model->idigv=(int)$igvad;
                $tipomonedad=$_POST['TipoMoneda']['idtipo_moneda'];
                $model->idtipo_moneda=(int)$tipomonedad;

                $model=Producto::model()->with('idmodelo0', 'idmodelo0.idmarca0', 'idmodelo0.idmarca0.idcategoria0')->findByPk((int)$id);
                $model->idmarca = $model->idmodelo0->idmarca;
                $model->idcategoria = $model->idmodelo0->idmarca0->idcategoria;

                if(isset($_POST['Producto']))
                        {
                            $model->attributes=$_POST['Producto'];
                            if($image[0]!=''){unlink('images/'.$oculto);unlink('images/'.'_'.$oculto);$model->foto=$namefile;}
                            else{$model->foto=$oculto;}
                            if($model->save())
                            {
                                if($image[0]!=''){MyController::subirArchivo($image,'images/',$namefile);}
                                if($idproveedor!='')
                                {
                                $connection=  Yii::app()->db;
                                $sqlStatement="call __producto_proveedor($idproveedor,$model->idproducto);";
                                $command=$connection->createCommand($sqlStatement);
                                $command->execute();
                                }
                                $this->redirect(array('view','id'=>$model->idproducto));
                            }
                        }


		$this->render('update',array(

                        'model'=>$model,
                        'igv'=>$igv,
                        'proveedor'=>$proveedor,
                        'tipomoneda'=>$tipomoneda,
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
	
	/**
	 * Manages all models.
	 */
	
	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{
		$model=Producto::model()->findByPk((int)$id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

         public function actionLimpiar(){
        echo CHtml::tag('option',array('value' => '00'),CHtml::encode('Selddd'),true);
    }
	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */


    public function actionmarcas()
    {
             $data=Marca::model()->findAll('idcategoria=:idcategoria',array(':idcategoria'=>(int) $_POST['Producto']['idcategoria']));

            echo CHtml::tag('option',array('value' => '0,0'),CHtml::encode('Seleccionar'),true);
             $data=CHtml::listData($data,'idmarca','descripcion');
            
		foreach($data as $value=>$name)
		{
			echo CHtml::tag('option',
                         array('value'=>$value),CHtml::encode($name),true);
		}

    }

public function actionmodelo()
    {

          $data=  Modelo::model()->findAll('idmarca=:idmarca',array(':idmarca'=>(int) $_POST['Producto']['idmarca']));


          
		$data=CHtml::listData($data,'idmodelo','descripcion');

                echo CHtml::tag('option',array('value' => '0,0'),CHtml::encode('Seleccionar'),true);
		foreach($data as $value=>$name)
		{
			echo CHtml::tag('option',
                array('value'=>$value),CHtml::encode($name),true);
		}

            



    }

	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='producto-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
