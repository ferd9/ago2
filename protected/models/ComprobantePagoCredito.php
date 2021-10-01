<?php

/**
 * This is the model class for table "ago.comprobante_pago_credito".
 *
 * The followings are the available columns in table 'ago.comprobante_pago_credito':
 * @property integer $idcomprobante_pago_credito
 * @property integer $idventa
 * @property string $descripcion
 * @property integer $cuotas
 * @property string $fecha_inicio
 * @property string $fecha_fin
 * @property string $usuario
 *
 * The followings are the available model relations:
 * @property Venta $idventa0
 * @property DetalleComprobantePagoCredito[] $detalleComprobantePagoCreditos
 */
class ComprobantePagoCredito extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ComprobantePagoCredito the static model class
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
		return 'comprobante_pago_credito';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idventa, descripcion, cuotas, fecha_inicio, fecha_fin, usuario', 'required'),
			array('idventa, cuotas', 'numerical', 'integerOnly'=>true),
			array('descripcion', 'length', 'max'=>200),
			array('usuario', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idcomprobante_pago_credito, idventa, descripcion, cuotas, fecha_inicio, fecha_fin, usuario', 'safe', 'on'=>'search'),
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
			'idventa0' => array(self::BELONGS_TO, 'Venta', 'idventa'),
			'detalleComprobantePagoCreditos' => array(self::HAS_MANY, 'DetalleComprobantePagoCredito', 'idcomprobante_pago_credito'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idcomprobante_pago_credito' => 'Idcomprobante Pago Credito',
			'idventa' => 'Idventa',
			'descripcion' => 'Descripcion',
			'cuotas' => 'Cuotas',
			'fecha_inicio' => 'Fecha Inicio',
			'fecha_fin' => 'Fecha Fin',
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

		$criteria->compare('idcomprobante_pago_credito',$this->idcomprobante_pago_credito);
		$criteria->compare('idventa',$this->idventa);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('cuotas',$this->cuotas);
		$criteria->compare('fecha_inicio',$this->fecha_inicio,true);
		$criteria->compare('fecha_fin',$this->fecha_fin,true);
		$criteria->compare('usuario',$this->usuario,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}