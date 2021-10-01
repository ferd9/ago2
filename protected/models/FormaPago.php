<?php

/**
 * This is the model class for table "ago.forma_pago".
 *
 * The followings are the available columns in table 'ago.forma_pago':
 * @property integer $idforma_pago
 * @property string $descripcion
 *
 * The followings are the available model relations:
 * @property DetalleComprobantePagoCredito[] $detalleComprobantePagoCreditos
 * @property DetallePagoVenta[] $detallePagoVentas
 */
class FormaPago extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return FormaPago the static model class
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
		return 'forma_pago';
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
			array('idforma_pago, descripcion', 'safe', 'on'=>'search'),
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
			'detalleComprobantePagoCreditos' => array(self::HAS_MANY, 'DetalleComprobantePagoCredito', 'idforma_pago'),
			'detallePagoVentas' => array(self::HAS_MANY, 'DetallePagoVenta', 'idforma_pago'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idforma_pago' => 'Idforma Pago',
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

		$criteria->compare('idforma_pago',$this->idforma_pago);
		$criteria->compare('descripcion',$this->descripcion,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}