<?php
/* 
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SelectproductosController
 *
 * @author HENRY
 */
class SelectproductosController extends Controller{


    public $layout='//layouts/capaProductos';

         public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
		);
	}


        public function accessRules()
	{

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
                                'users'=>array('*'),
                                'expression'=>"{$nivelll}==1 && {$estado}==1 || {$nivelll}==2 && {$estado}==1 ",

			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','productos'),
                                'users'=>array('*'),
				'expression'=>"{$nivelll}==1 && {$estado}==1 || {$nivelll}==2 && {$estado}==1 ",
			),

                        array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('update'),
                                'users'=>array('*'),
				'expression'=>"{$nivelll}==1 && {$estado}==1",
			),

			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete','productos','grabarProductos','saveProductos','grabarProductoscompra','grabarProductosguiaremisioncompra','grabarProductosguiaremisionventa'),
                                'users'=>array('*'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

        public function actionView()
	{
		echo "<h1>Esta Opcion no esta disponible</h1>";
	}

        public function actionProductos()
         {
             $modelProducto = new Producto();
             $this->render('_productos',array('modelProducto'=>$modelProducto));
         }

           public static function getdescuento()
            {
            $desc = PrecioVentaTmp::model()->findAllBySql("SELECT * FROM precio_venta_tmp WHERE usuario='".Yii::app()->user->name."' LIMIT 1;");
            $descuento = $desc[0]['descuento'];
            return $descuento;
            }


         public function actionGrabarProductos()
         {
             $modelProducto = new Producto();
             $model = new SaveUs();
             $idProducto = $_GET['id'];
             $buscar= $_GET['buscar'];
             $activar = $_GET['activar'];
             $producto = Producto::model()->findByPk((int)$idProducto);
             if(isset($_POST['SaveUs']))
		{
			$model->attributes=$_POST['SaveUs'];
			if($model->save())
                        {
                                
                            echo "Producto agregado...";

                                $descuento = SelectproductosController::getdescuento();
                                //echo $descuento;
                                $totalab = MyModel::getSuma();
                                $total = $totalab - $descuento;
                                $Subt = MyModel::getSubTotal($total);
                                $SubTotal = MyModel::getRedondear($Subt);
                                $ig = MyModel::getIgvMonto($total);
                                $igv = MyModel::getRedondear($ig);
                                $connection=  Yii::app()->db;
                                $usera = Yii::app()->user->name;
                                $sqlStatement="CALL s_insertar_precio_venta('$usera',$total,$SubTotal,$igv);";
                                //echo $sqlStatement;
                                $command=$connection->createCommand($sqlStatement);
                                $command->execute();
                                $activar = "a";                                
                        }
		}
           
             $this->render('_productos',array('modelProducto'=>$modelProducto,'producto'=>$producto,'activar'=>$activar,'model'=>$model,'buscar'=>$buscar));
         }

         public function actionSaveProductos()
         {
             $model=new SaveUs;
             if(isset($_POST['SaveUs']))
		{
			$model->attributes=$_POST['SaveUs'];
			if($model->save())
                        {
                        	echo "Producto agregado...";
                        }
                        else
                                echo "Error";
		}
            print_r($_POST);
         }
/*------------------------------compras----------------------------------------------------------------------*/
         public function actionGrabarProductoscompra()
         {
             $modelProducto = new Producto();
             $model = new Pcompra();
             $idProducto = $_GET['id'];
             $buscar= $_GET['buscar'];
             $activar = $_GET['activar'];
             $producto = Producto::model()->findByPk((int)$idProducto);
             if(isset($_POST['Pcompra']))
		{
			$model->attributes=$_POST['Pcompra'];
			if($model->save())
                        {

                            echo "Producto agregado...";
                            $activar = "a";    
                        }
                        else
                                echo "Error";
		}
             $this->render('_productos2',array('modelProducto'=>$modelProducto,'producto'=>$producto,'activar'=>$activar,'model'=>$model,'buscar'=>$buscar));
         }


/*-----------------------------guia remision compras----------------------------------------------------------------------*/
         public function actionGrabarProductosguiaremisioncompra()
         {
             $modelProducto = new Producto();
             $model = new PguiaCompra();
             $idProducto = $_GET['id'];
             $buscar= $_GET['buscar'];
             $activar = $_GET['activar'];
             $producto = Producto::model()->findByPk((int)$idProducto);
             if(isset($_POST['PguiaCompra']))
		{
			$model->attributes=$_POST['PguiaCompra'];
			if($model->save())
                        {

                            echo "Producto agregado...";
                            $activar = "a";
                        }
                        else
                                echo "Error";
		}
             $this->render('_productos3',array('modelProducto'=>$modelProducto,'producto'=>$producto,'activar'=>$activar,'model'=>$model,'buscar'=>$buscar));
         }

/*-----------------------------guia remision venta----------------------------------------------------------------------*/
         public function actionGrabarProductosguiaremisionventa()
         {
             $modelProducto = new Producto();
             $model = new PguiaVenta();
             $idProducto = $_GET['id'];
             $buscar= $_GET['buscar'];
             $activar = $_GET['activar'];
             $producto = Producto::model()->findByPk((int)$idProducto);
             if(isset($_POST['PguiaVenta']))
		{
			$model->attributes=$_POST['PguiaVenta'];
			if($model->save())
                        {

                            echo "Producto agregado...";
                            $activar = "a";
                        }
                        else
                                echo "Error";
		}
             $this->render('_productos4',array('modelProducto'=>$modelProducto,'producto'=>$producto,'activar'=>$activar,'model'=>$model,'buscar'=>$buscar));
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
?>
