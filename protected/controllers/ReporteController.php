<?php

class ReporteController extends Controller
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
				'actions'=>array('index','datareport','cliente','trabajador','mercaderia','reportmerca','merstockalma','reportmerstockalma','ventaproducto','reportVentaproducto'),
				'users'=>array('@'),
                                'expression'=>"{$nivelll}==1",
			),
                        array('allow',
				'actions'=>array('precioscompraventa','ventadglobal','ventadglobalab','grafico','grafico2','rankingcompradores','reportRankingcompradores','rankingvendedores','reportRankingvendedores'),
				'users'=>array('@'),
                                'expression'=>"{$nivelll}==1",
			),

                        array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('ventavendedor','reportventavendedor','proveedor','prueba','productovendido','reportproductovendido'),
				'users'=>array('@'),
                                'expression'=>"{$nivelll}==1",
			),

			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

        public static function conectar()
        {
            $db_host="192.168.1.11";
            $db_name="ago";
            $db_user="root";
            $db_password="123456";
            $conection= mysqli_connect($db_host,$db_user,$db_password) or die ("Error conectando a la DB");
            mysqli_select_db($conection, $db_name) or die ("Error seleccionando la DB");
            return $conection;
        }
         //--------------------------------------------------------------------------------------------
	public function actionIndex()
	{
                
		$this->render('index');
	}
        //--------------------------------------------------------------------------------------------
        public function actionCliente()
	{

		$this->renderPartial('_cliente');
	}
        //--------------------------------------------------------------------------------------------
         public function actionProveedor()
	{

		$this->renderPartial('_proveedor');
	}
        //--------------------------------------------------------------------------------------------
        public function actionTrabajador()
	{

		$this->renderPartial('_trabajador');
	}
         //--------------------------------------------------------------------------------------------
        public function actionMercaderia()
	{
		$this->render('_mercaderia');
	}

         public function actionReportmerca()
	{
                $tipo=$_GET['tipo'];
                $moneda1=TipoMoneda::getmoneda1();
                $moneda2=TipoMoneda::getmoneda2();
                $tipocambiomoneda=TipoMoneda::getcambiomoneda();
                //echo $tipo;
		$this->renderPartial('_mercaderiab',array(
                        'tipo'=>$tipo,
                        'tipocambiomoneda'=>$tipocambiomoneda,
                        'moneda1'=>$moneda1,
                        'moneda2'=>$moneda2,
		));
	}

       //--------------------------------------------------------------------------------------------
        public function actionMerstockalma()
	{
		$this->render('_merstockalma');
	}

         public function actionReportmerstockalma()
	{
                $tipo=$_GET['tipo'];
                $alma=$_GET['tipoab'];
                $moneda1=TipoMoneda::getmoneda1();
                $moneda2=TipoMoneda::getmoneda2();
                $nomalmacen = Almacen::getnombreAlmacen($alma);
                $tipocambiomoneda=TipoMoneda::getcambiomoneda();
                //echo $tipo;
		$this->renderPartial('_merstockalmabb',array(
                        'tipo'=>$tipo,
                        'tipocambiomoneda'=>$tipocambiomoneda,
                        'alma'=>$alma,
                        'nomalmacen'=>$nomalmacen,
                        'moneda1'=>$moneda1,
                        'moneda2'=>$moneda2,
		));
	}

        //--------------------------------------------------------------------------------------------
        public function actionVentaproducto()
	{
		$this->render('_ventaproducto');
	}

         public function actionReportVentaproducto()
	{
                $tipo=$_GET['tipo'];
                $fecha1=$_GET['fecha1'];
                $fecha2=$_GET['fecha2'];
                $idproducto = Producto::getidproducto($tipo);
                //echo $tipo;
		$this->renderPartial('_ventaproductoab',array(
                        'idproducto'=>$idproducto,
                        'fecha1'=>$fecha1,
                        'fecha2'=>$fecha2,
                        'tipo'=>$tipo,
		));
	}


         //--------------------------------------------------------------------------------------------
        public function actionDatareport()
	{
                $tipo=$_GET['tipo'];
                $fecha1=$_GET['fecha1'];
                $fecha2=$_GET['fecha2'];
                $caja = new Caja();
                //echo $tipo;
		$this->renderPartial('_movcaja',array(
                        'tipo'=>$tipo,
                        'fecha1'=>$fecha1,
                        'fecha2'=>$fecha2,
                        'caja'=>$caja,
		));
	}
        //--------------------------------------------------------------------------------------------

        public function actionPrecioscompraventa()
	{

		$this->renderPartial('_precioscompraventa');
	}
        //--------------------------------------------------------------------------------------------

        public function actionVentadglobal()
	{

		
                $this->render('_ventadglo');
	}

        public function actionVentadglobalab()
	{

                $fecha=$_GET['fecha'];
                $this->renderPartial('_ventadglobal',array(
                        'fecha'=>$fecha,
		));
	}

        //--------------------------------------------------------------------------------------------


        public function actionGrafico()
	{  
                $this->render('_grafico');
	}

        public static function generaranios()
	{
                $data = array();
                $data2 = array();
                $anio=date('Y');
                $emp = $anio-15;
                for($i = $anio; $i >= $emp; $i--)
                {
                 $data[] = $i;
                }
                $data2 = array_combine($data, $data);
                return $data2;
                
	}

        public function actionGrafico2()
	{
                $fecha=$_GET['fecha'];
                $connection=  Yii::app()->db;
                $sqlStatement="CALL ___grafico_ventas_totales('$fecha');";
                $command=$connection->createCommand($sqlStatement);
                $command->execute();
                $this->render('_grafico2',array(
                        'fecha'=>$fecha,
		));
	}

        //--------------------------------------------------------------------------------------------
        public function actionRankingcompradores()
	{
		$this->render('_rankingcompradores');
	}

         public function actionReportRankingcompradores()
	{
                $fecha1=$_GET['fecha1'];
                $fecha2=$_GET['fecha2'];
		$this->renderPartial('_rankingcompradoresab',array(
                        'fecha1'=>$fecha1,
                        'fecha2'=>$fecha2,
		));
	}

        //--------------------------------------------------------------------------------------------
        public function actionRankingvendedores()
	{
		$this->render('_rankingvendedores');
	}

         public function actionReportRankingvendedores()
	{
                $fecha1=$_GET['fecha1'];
                $fecha2=$_GET['fecha2'];
		$this->renderPartial('_rankingvendedoresab',array(
                        'fecha1'=>$fecha1,
                        'fecha2'=>$fecha2,
		));
	}

        //--------------------------------------------------------------------------------------------
        public function actionVentavendedor()
	{
		$this->render('_ventavendedor');
	}

         public function actionReportventavendedor()
	{
                $tipo=$_GET['tipo'];
                $fecha1=$_GET['fecha1'];
                $fecha2=$_GET['fecha2'];
		$this->renderPartial('_ventavendedorab',array(
                        'tipo'=>$tipo,
                        'fecha1'=>$fecha1,
                        'fecha2'=>$fecha2,
		));
	}

        //--------------------------------------------------------------------------------------------
        public function actionProductovendido()
	{
		$this->render('_productovendido');
	}

        public function actionReportproductovendido()
	{
                $fecha1=$_GET['fecha1'];
                $fecha2=$_GET['fecha2'];
		$this->renderPartial('_productovendidoab',array(
                        'fecha1'=>$fecha1,
                        'fecha2'=>$fecha2,
		));
	}

}
