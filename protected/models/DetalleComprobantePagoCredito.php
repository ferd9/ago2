<?php

/**
 * This is the model class for table "ago.detalle_comprobante_pago_credito".
 *
 * The followings are the available columns in table 'ago.detalle_comprobante_pago_credito':
 * @property integer $iddetalle_comprobante_pago_credito
 * @property integer $idcomprobante_pago_credito
 * @property integer $idforma_pago
 * @property integer $idtipo_moneda
 * @property string $importe
 * @property string $fecha_pago
 * @property string $usuario
 *
 * The followings are the available model relations:
 * @property ComprobantePagoCredito $idcomprobantePagoCredito0
 * @property FormaPago $idformaPago0
 * @property TipoMoneda $idtipoMoneda0
 */
class DetalleComprobantePagoCredito extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return DetalleComprobantePagoCredito the static model class
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
		return 'detalle_comprobante_pago_credito';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idcomprobante_pago_credito, idforma_pago, idtipo_moneda, importe, fecha_pago, usuario', 'required'),
			array('idcomprobante_pago_credito, idforma_pago, idtipo_moneda', 'numerical', 'integerOnly'=>true),
			array('importe', 'length', 'max'=>9),
			array('usuario', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('iddetalle_comprobante_pago_credito, idcomprobante_pago_credito, idforma_pago, idtipo_moneda, importe, fecha_pago, usuario', 'safe', 'on'=>'search'),
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
			'idcomprobantePagoCredito0' => array(self::BELONGS_TO, 'ComprobantePagoCredito', 'idcomprobante_pago_credito'),
			'idformaPago0' => array(self::BELONGS_TO, 'FormaPago', 'idforma_pago'),
			'idtipoMoneda0' => array(self::BELONGS_TO, 'TipoMoneda', 'idtipo_moneda'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'iddetalle_comprobante_pago_credito' => 'Iddetalle Comprobante Pago Credito',
			'idcomprobante_pago_credito' => 'Idcomprobante Pago Credito',
			'idforma_pago' => 'Idforma Pago',
			'idtipo_moneda' => 'Idtipo Moneda',
			'importe' => 'Importe',
			'fecha_pago' => 'Fecha Pago',
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

		$criteria->compare('iddetalle_comprobante_pago_credito',$this->iddetalle_comprobante_pago_credito);
		$criteria->compare('idcomprobante_pago_credito',$this->idcomprobante_pago_credito);
		$criteria->compare('idforma_pago',$this->idforma_pago);
		$criteria->compare('idtipo_moneda',$this->idtipo_moneda);
		$criteria->compare('importe',$this->importe,true);
		$criteria->compare('fecha_pago',$this->fecha_pago,true);
		$criteria->compare('usuario',$this->usuario,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}