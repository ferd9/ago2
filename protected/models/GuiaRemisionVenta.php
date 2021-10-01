<?php

/**
 * This is the model class for table "guia_remision_venta".
 *
 * The followings are the available columns in table 'guia_remision_venta':
 * @property integer $idguia_remision_venta
 * @property integer $idtransporte
 * @property integer $idcliente
 * @property string $numero_documento
 * @property string $direccion_origen
 * @property string $direccion_destino
 * @property string $fecha_registro
 * @property string $fecha_traslado
 * @property integer $almacen
 * @property string $estado
 * @property string $usuario
 *
 * The followings are the available model relations:
 * @property DetalleGuiaVenta[] $detalleGuiaVentas
 * @property Cliente $idcliente0
 * @property Transporte $idtransporte0
 */
class GuiaRemisionVenta extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return GuiaRemisionVenta the static model class
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
		return 'guia_remision_venta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fecha_registro, almacen, usuario', 'required'),
			array('idtransporte, idcliente, almacen', 'numerical', 'integerOnly'=>true),
			array('numero_documento', 'length', 'max'=>20),
			array('direccion_origen, direccion_destino', 'length', 'max'=>200),
			array('estado', 'length', 'max'=>1),
			array('usuario', 'length', 'max'=>50),
			array('fecha_traslado', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idguia_remision_venta, idtransporte, idcliente, numero_documento, direccion_origen, direccion_destino, fecha_registro, fecha_traslado, almacen, estado, usuario', 'safe', 'on'=>'search'),
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
			'detalleGuiaVentas' => array(self::HAS_MANY, 'DetalleGuiaVenta', 'idguia_remision_venta'),
			'idcliente0' => array(self::BELONGS_TO, 'Cliente', 'idcliente'),
			'idtransporte0' => array(self::BELONGS_TO, 'Transporte', 'idtransporte'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idguia_remision_venta' => 'Idguia Remision Venta',
			'idtransporte' => 'Idtransporte',
			'idcliente' => 'Idcliente',
			'numero_documento' => 'Numero Documento',
			'direccion_origen' => 'Direccion Origen',
			'direccion_destino' => 'Direccion Destino',
			'fecha_registro' => 'Fecha Registro',
			'fecha_traslado' => 'Fecha Traslado',
			'almacen' => 'Almacen',
			'estado' => 'Estado',
			'usuario' => 'Usuario',
		);
	}


        public static function getnumerodocguiaventa($importguia)
            {
            $num = GuiaRemisionVenta::model()->findAllBySql("SELECT * FROM guia_remision_venta WHERE idguia_remision_venta='".$importguia."' LIMIT 1;");
            $numdoc = $num[0]['numero_documento'];
            return $numdoc;
            }


         public static function insertar_guia_venta_importar($importguia)
         {

                $usuarioo = Yii::app()->user->name;
                $almacenn = (int)MyModel::getIdAlmacen();
                $connection=  Yii::app()->db;
                $sqlStatement="CALL __importar_guia_venta_fv($importguia, '$usuarioo',$almacenn);";
                //echo $sqlStatement;
                $command=$connection->createCommand($sqlStatement);
                $command->execute();
                GuiaRemisionVenta::precioguiaventa($usuarioo);
         }

          public static function insertar_guia_venta_limpiar()
         {
                $usuarioo = Yii::app()->user->name;
                $almacenn = (int)MyModel::getIdAlmacen();
                $connection=  Yii::app()->db;
                $sqlStatement="CALL __importar_guia_venta_fv_limpiar('$usuarioo',$almacenn);";
                //echo $sqlStatement;
                $command=$connection->createCommand($sqlStatement);
                $command->execute();
                GuiaRemisionVenta::precioguiaventa($usuarioo);
         }

         public static function precioguiaventa($usuarioo)
         {
                $descuento = SelectproductosController::getdescuento();
                $totalab = MyModel::getSuma();
                $total = $totalab - $descuento;
                $Subt = MyModel::getSubTotal($total);
                $SubTotal = MyModel::getRedondear($Subt);
                $ig = MyModel::getIgvMonto($total);
                $igv = MyModel::getRedondear($ig);
                $connection=  Yii::app()->db;
                $sqlStatement="CALL s_insertar_precio_venta('$usuarioo',$total,$SubTotal,$igv);";
                $command=$connection->createCommand($sqlStatement);
                $command->execute();
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
                $criteria->order="fecha_registro desc";
		$criteria->compare('t.idguia_remision_venta',$this->idguia_remision_venta);
		$criteria->compare('idtransporte0.razon_social',$this->idtransporte);
		$criteria->compare('idcliente0',$this->idcliente);
		$criteria->compare('t.numero_documento',$this->numero_documento,true);
		$criteria->compare('t.direccion_origen',$this->direccion_origen,true);
		$criteria->compare('t.direccion_destino',$this->direccion_destino,true);
		$criteria->compare('t.fecha_registro',$this->fecha_registro,true);
		$criteria->compare('t.fecha_traslado',$this->fecha_traslado,true);
		$criteria->compare('t.almacen',$this->almacen,true);
		$criteria->compare('t.estado',$this->estado,true);
		$criteria->compare('t.usuario',$this->usuario,true);
                $criteria->with=array('idtransporte0');
		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}