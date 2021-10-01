<?php

/**
 * This is the model class for table "ago.tipo_moneda".
 *
 * The followings are the available columns in table 'ago.tipo_moneda':
 * @property integer $idtipo_moneda
 * @property string $descripcion
 *
 * The followings are the available model relations:
 * @property Caja[] $cajas
 * @property DetalleCompra[] $detalleCompras
 * @property DetalleComprobantePagoCredito[] $detalleComprobantePagoCreditos
 * @property DetallePagoVenta[] $detallePagoVentas
 * @property Producto[] $productos
 */
class TipoMoneda extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return TipoMoneda the static model class
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
		return 'tipo_moneda';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('descripcion', 'required'),
			array('descripcion', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idtipo_moneda, descripcion', 'safe', 'on'=>'search'),
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
			'cajas' => array(self::HAS_MANY, 'Caja', 'idtipo_moneda'),
			'detalleCompras' => array(self::HAS_MANY, 'DetalleCompra', 'idtipo_moneda'),
			'detalleComprobantePagoCreditos' => array(self::HAS_MANY, 'DetalleComprobantePagoCredito', 'idtipo_moneda'),
			'detallePagoVentas' => array(self::HAS_MANY, 'DetallePagoVenta', 'idtipo_moneda'),
			'productos' => array(self::HAS_MANY, 'Producto', 'idtipo_moneda'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idtipo_moneda' => 'Idtipo Moneda',
			'descripcion' => 'Descripcion',
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

		$criteria->compare('idtipo_moneda',$this->idtipo_moneda);
		$criteria->compare('descripcion',$this->descripcion,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

         public static function getTipoMoneda()
        {
            $tipomoneda = self::model()->findAll();

            return  CHtml::listData($tipomoneda,'idtipo_moneda','descripcion');
        }

         public static function getTipoMoneda2()
        {
            $tipomoneda = self::model()->findAll();

            return  CHtml::listData($tipomoneda,'descripcion','descripcion');
        }

         public static function getcambiomoneda()
            {
            $cm = TipoMoneda::model()->findAllBySql("SELECT cambio FROM tipo_moneda WHERE idtipo_moneda=1 LIMIT 1;");
            $camb = $cm[0]['cambio'];
            return $camb;
            }

         public static function getmoneda1()
            {
            $m1 = TipoMoneda::model()->findAllBySql("SELECT descripcion FROM tipo_moneda WHERE idtipo_moneda=1 LIMIT 1;");
            $mo1 = $m1[0]['descripcion'];
            return $mo1;
            }

            public static function getmoneda2()
            {
            $m2 = TipoMoneda::model()->findAllBySql("SELECT descripcion FROM tipo_moneda WHERE idtipo_moneda=2 LIMIT 1;");
            $mo2 = $m2[0]['descripcion'];
            return $mo2;
            }
}