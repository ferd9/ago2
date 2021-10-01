<?php

/**
 * This is the model class for table "venta".
 *
 * The followings are the available columns in table 'venta':
 * @property integer $idventa
 * @property integer $idcliente
 * @property integer $idtipo_documento
 * @property integer $idtipo_pago
 * @property string $numero_documento
 * @property string $fecha_venta
 * @property string $fecha_registro
 * @property string $hora
 * @property string $subtotal
 * @property string $igv
 * @property string $importe_total
 * @property string $estado_venta
 * @property string $estado_venta_pago
 * @property string $estado
 * @property string $usuario
 * @property integer $almacen
 * @property string $descuento
 *
 * The followings are the available model relations:
 * @property ComprobantePagoCredito[] $comprobantePagoCreditos
 * @property DetallePagoVenta $detallePagoVenta
 * @property DetalleVenta[] $detalleVentas
 * @property Garantia[] $garantias
 * @property GuiaRemisionVenta[] $guiaRemisionVentas
 * @property Cliente $idcliente0
 * @property TipoDocumento $idtipoDocumento0
 * @property TipoPago $idtipoPago0
 */
class Venta extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Venta the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'venta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idcliente', 'required'),
			array('idcliente, idtipo_documento, idtipo_pago, almacen', 'numerical', 'integerOnly'=>true),
			array('numero_documento', 'length', 'max'=>40),
			array('subtotal, igv, importe_total, descuento', 'length', 'max'=>9),
			array('estado_venta, estado', 'length', 'max'=>1),
			array('estado_venta_pago, usuario', 'length', 'max'=>50),
			array('fecha_venta, fecha_registro, hora', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idventa, idcliente, idtipo_documento, idtipo_pago, numero_documento, fecha_venta, fecha_registro, hora, subtotal, igv, importe_total, estado_venta, estado_venta_pago, estado, usuario, almacen, descuento', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'comprobantePagoCreditos' => array(self::HAS_MANY, 'ComprobantePagoCredito', 'idventa'),
			'detallePagoVenta' => array(self::HAS_ONE, 'DetallePagoVenta', 'idventa'),
			'detalleVentas' => array(self::HAS_MANY, 'DetalleVenta', 'idventa'),
			'garantias' => array(self::HAS_MANY, 'Garantia', 'idventa'),
			'guiaRemisionVentas' => array(self::HAS_MANY, 'GuiaRemisionVenta', 'idventa'),
			'idcliente0' => array(self::BELONGS_TO, 'Cliente', 'idcliente'),
			'idtipoDocumento0' => array(self::BELONGS_TO, 'TipoDocumento', 'idtipo_documento'),
			'idtipoPago0' => array(self::BELONGS_TO, 'TipoPago', 'idtipo_pago'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idventa' => 'Idventa',
			'idcliente' => 'Idcliente',
			'idtipo_documento' => 'Idtipo Documento',
			'idtipo_pago' => 'Idtipo Pago',
			'numero_documento' => 'Numero Documento',
			'fecha_venta' => 'Fecha Venta',
			'fecha_registro' => 'Fecha Registro',
			'hora' => 'Hora',
			'subtotal' => 'Subtotal',
			'igv' => 'Igv',
			'importe_total' => 'Importe Total',
			'estado_venta' => 'Estado Venta',
			'estado_venta_pago' => 'Estado Venta Pago',
			'estado' => 'Estado',
			'usuario' => 'Usuario',
			'almacen' => 'Almacen',
			'descuento' => 'Descuento',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
                $criteria->order="idventa desc";
		$criteria->compare('idventa',$this->idventa);
		$criteria->compare('idcliente',$this->idcliente);
		$criteria->compare('idtipoDocumento0.descripcion',$this->idtipo_documento);
		$criteria->compare('idtipoPago0.descripcion',$this->idtipo_pago);
		$criteria->compare('numero_documento',$this->numero_documento,true);
		$criteria->compare('fecha_venta',$this->fecha_venta,true);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('hora',$this->hora,true);
		$criteria->compare('subtotal',$this->subtotal,true);
		$criteria->compare('igv',$this->igv,true);
		$criteria->compare('importe_total',$this->importe_total,true);
		$criteria->compare('estado_venta',$this->estado_venta,true);
		$criteria->compare('estado_venta_pago',$this->estado_venta_pago,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('almacen',$this->almacen);
		$criteria->compare('descuento',$this->descuento,true);
                $criteria->with=array('idtipoDocumento0','idtipoPago0');
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

         public function searchfacv()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
                $usuario= Yii::app()->user->name;
                $criteria->order="idventa desc";
                $criteria->condition="idtipo_documento=1";
		$criteria->compare('idventa',$this->idventa);
		$criteria->compare('idcliente',$this->idcliente);
		$criteria->compare('idtipo_documento',$this->idtipo_documento);
		$criteria->compare('idtipoPago0.descripcion',$this->idtipo_pago);
		$criteria->compare('numero_documento',$this->numero_documento,true);
		$criteria->compare('fecha_venta',$this->fecha_venta,true);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('hora',$this->hora,true);
		$criteria->compare('subtotal',$this->subtotal,true);
		$criteria->compare('igv',$this->igv,true);
		$criteria->compare('importe_total',$this->importe_total,true);
		$criteria->compare('estado_venta',$this->estado_venta,true);
		$criteria->compare('estado_venta_pago',$this->estado_venta_pago,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('almacen',$this->almacen);
		$criteria->compare('descuento',$this->descuento,true);
                $criteria->with=array('idtipoPago0');
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}


        public function searchblv()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
                $usuario= Yii::app()->user->name;
                $criteria->order="idventa desc";
                $criteria->condition="idtipo_documento=2";
		$criteria->compare('idventa',$this->idventa);
		$criteria->compare('idcliente',$this->idcliente);
		$criteria->compare('idtipo_documento',$this->idtipo_documento);
		$criteria->compare('idtipoPago0.descripcion',$this->idtipo_pago);
		$criteria->compare('numero_documento',$this->numero_documento,true);
		$criteria->compare('fecha_venta',$this->fecha_venta,true);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('hora',$this->hora,true);
		$criteria->compare('subtotal',$this->subtotal,true);
		$criteria->compare('igv',$this->igv,true);
		$criteria->compare('importe_total',$this->importe_total,true);
		$criteria->compare('estado_venta',$this->estado_venta,true);
		$criteria->compare('estado_venta_pago',$this->estado_venta_pago,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('almacen',$this->almacen);
		$criteria->compare('descuento',$this->descuento,true);
                $criteria->with=array('idtipoPago0');
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}


        public function searchntv()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
                $usuario= Yii::app()->user->name;
                $criteria->order="idventa desc";
                $criteria->condition="idtipo_documento=3";
		$criteria->compare('idventa',$this->idventa);
		$criteria->compare('idcliente',$this->idcliente);
		$criteria->compare('idtipo_documento',$this->idtipo_documento);
		$criteria->compare('idtipoPago0.descripcion',$this->idtipo_pago);
		$criteria->compare('numero_documento',$this->numero_documento,true);
		$criteria->compare('fecha_venta',$this->fecha_venta,true);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('hora',$this->hora,true);
		$criteria->compare('subtotal',$this->subtotal,true);
		$criteria->compare('igv',$this->igv,true);
		$criteria->compare('importe_total',$this->importe_total,true);
		$criteria->compare('estado_venta',$this->estado_venta,true);
		$criteria->compare('estado_venta_pago',$this->estado_venta_pago,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('almacen',$this->almacen);
		$criteria->compare('descuento',$this->descuento,true);
                $criteria->with=array('idtipoPago0');
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

         public function searchcotv()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
                $usuario= Yii::app()->user->name;
                $criteria->order="idventa desc";
                $criteria->condition="idtipo_documento=4";
		$criteria->compare('idventa',$this->idventa);
		$criteria->compare('idcliente',$this->idcliente);
		$criteria->compare('idtipo_documento',$this->idtipo_documento);
		$criteria->compare('idtipoPago0.descripcion',$this->idtipo_pago);
		$criteria->compare('numero_documento',$this->numero_documento,true);
		$criteria->compare('fecha_venta',$this->fecha_venta,true);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('hora',$this->hora,true);
		$criteria->compare('subtotal',$this->subtotal,true);
		$criteria->compare('igv',$this->igv,true);
		$criteria->compare('importe_total',$this->importe_total,true);
		$criteria->compare('estado_venta',$this->estado_venta,true);
		$criteria->compare('estado_venta_pago',$this->estado_venta_pago,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('almacen',$this->almacen);
		$criteria->compare('descuento',$this->descuento,true);
                $criteria->with=array('idtipoPago0');
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}


        public function searchab()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
                $usuario= Yii::app()->user->name;
                $criteria->order="idventa desc";
                $criteria->condition="idtipo_documento=4";
		$criteria->compare('idventa',$this->idventa);
		$criteria->compare('idcliente',$this->idcliente);
		$criteria->compare('idtipo_documento',$this->idtipo_documento);
		$criteria->compare('idtipoPago0.descripcion',$this->idtipo_pago);
		$criteria->compare('numero_documento',$this->numero_documento,true);
		$criteria->compare('fecha_venta',$this->fecha_venta,true);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('hora',$this->hora,true);
		$criteria->compare('subtotal',$this->subtotal,true);
		$criteria->compare('igv',$this->igv,true);
		$criteria->compare('importe_total',$this->importe_total,true);
		$criteria->compare('estado_venta',$this->estado_venta,true);
		$criteria->compare('estado_venta_pago',$this->estado_venta_pago,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('almacen',$this->almacen);
		$criteria->compare('descuento',$this->descuento,true);
                $criteria->with=array('idtipoPago0');
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

         public function searchcdd()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;
                $usuario= Yii::app()->user->name;
                $criteria->order="idventa desc";
                $criteria->condition="idtipo_documento=3";
		$criteria->compare('idventa',$this->idventa);
		$criteria->compare('idcliente',$this->idcliente);
		$criteria->compare('idtipo_documento',$this->idtipo_documento);
		$criteria->compare('idtipoPago0.descripcion',$this->idtipo_pago);
		$criteria->compare('numero_documento',$this->numero_documento,true);
		$criteria->compare('fecha_venta',$this->fecha_venta,true);
		$criteria->compare('fecha_registro',$this->fecha_registro,true);
		$criteria->compare('hora',$this->hora,true);
		$criteria->compare('subtotal',$this->subtotal,true);
		$criteria->compare('igv',$this->igv,true);
		$criteria->compare('importe_total',$this->importe_total,true);
		$criteria->compare('estado_venta',$this->estado_venta,true);
		$criteria->compare('estado_venta_pago',$this->estado_venta_pago,true);
		$criteria->compare('estado',$this->estado,true);
		$criteria->compare('usuario',$this->usuario,true);
		$criteria->compare('almacen',$this->almacen);
		$criteria->compare('descuento',$this->descuento,true);
                $criteria->with=array('idtipoPago0');
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
        
         public static function insertar_cotizacion_importar($importcotiza)
         {

                $usuarioo = Yii::app()->user->name;
                $almacenn = (int)MyModel::getIdAlmacen();
                $connection=  Yii::app()->db;
                $sqlStatement="CALL __importar_cotizacion_fv($importcotiza, '$usuarioo',$almacenn);";
                //echo $sqlStatement;
                $command=$connection->createCommand($sqlStatement);
                $command->execute();
                GuiaRemisionVenta::precioguiaventa($usuarioo);
         }

         public static function getnumerodoccotizacion($importcotiza)
            {
            $num = Venta::model()->findAllBySql("SELECT * FROM venta WHERE idventa='".$importcotiza."' LIMIT 1;");
            $numdoc = $num[0]['numero_documento'];
            return $numdoc;
            }
        
//        protected function afterSave()
//        {
//                if($this->isNewRecord)
//                {
//                    $this->attributes=$_POST['Venta'];
//                    $idcliente=ClienteController::getIdCliente($this->idcliente);
//                    $descripcion=$this->idtipoDocumento0->descripcion.'.'.$_POST['Venta']['numero_documento'];
//
//                    $connection=  Yii::app()->db;
//                    $sqlStatement="INSERT INTO puntos (idcliente, fecha, descripcion, entrada, salida) VALUES ('".$idcliente."',CURRENT_DATE,'".$descripcion."',101010,0);";
//                    $command=$connection->createCommand($sqlStatement);
//                    $command->execute();
//
//                    //throw new Exception($idcliente.' '.$descripcion);
//                    return TRUE;
//                }
//                else
//                return FALSE;
//        }

        public static function getCodCli($dato)
        {
            $codCliente = explode(' - ',$dato);
            $idCli = trim($codCliente[0]);
            return $idCli;
        }
}