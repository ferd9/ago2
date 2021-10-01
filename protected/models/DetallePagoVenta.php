<?php

/**
 * This is the model class for table "ago.detalle_pago_venta".
 *
 * The followings are the available columns in table 'ago.detalle_pago_venta':
 * @property integer $idventa
 * @property integer $idforma_pago
 * @property integer $idtipo_moneda
 * @property string $importe
 * @property string $fecha_pago
 * @property string $hora
 * @property string $usuario
 *
 * The followings are the available model relations:
 * @property FormaPago $idformaPago0
 * @property TipoMoneda $idtipoMoneda0
 * @property Venta $idventa0
 */
class DetallePagoVenta extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return DetallePagoVenta the static model class
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
		return 'detalle_pago_venta';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idventa', 'required'),
			array('idventa, idforma_pago, idtipo_moneda', 'numerical', 'integerOnly'=>true),
			array('importe', 'length', 'max'=>9),
			array('usuario', 'length', 'max'=>50),
			array('fecha_pago, hora', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idventa, idforma_pago, idtipo_moneda, importe, fecha_pago, hora, usuario', 'safe', 'on'=>'search'),
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
			'idformaPago0' => array(self::BELONGS_TO, 'FormaPago', 'idforma_pago'),
			'idtipoMoneda0' => array(self::BELONGS_TO, 'TipoMoneda', 'idtipo_moneda'),
			'idventa0' => array(self::BELONGS_TO, 'Venta', 'idventa'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idventa' => 'Idventa',
			'idforma_pago' => 'Idforma Pago',
			'idtipo_moneda' => 'Idtipo Moneda',
			'importe' => 'Importe',
			'fecha_pago' => 'Fecha Pago',
			'hora' => 'Hora',
			'usuario' => 'Usuario',
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

		$criteria->compare('idventa',$this->idventa);
		$criteria->compare('idforma_pago',$this->idforma_pago);
		$criteria->compare('idtipo_moneda',$this->idtipo_moneda);
		$criteria->compare('importe',$this->importe,true);
		$criteria->compare('fecha_pago',$this->fecha_pago,true);
		$criteria->compare('hora',$this->hora,true);
		$criteria->compare('usuario',$this->usuario,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}