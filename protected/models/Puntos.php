<?php

/**
 * This is the model class for table "ago.puntos".
 *
 * The followings are the available columns in table 'ago.puntos':
 * @property integer $idpuntos
 * @property integer $idcliente
 * @property string $fecha
 * @property string $descripcion
 * @property integer $entrada
 * @property integer $salida
 * @property string $estado
 *
 * The followings are the available model relations:
 * @property Cliente $idcliente0
 */
class Puntos extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Puntos the static model class
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
		return 'puntos';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idpuntos', 'required'),
			array('idpuntos, idcliente, entrada, salida', 'numerical', 'integerOnly'=>true),
			array('descripcion', 'length', 'max'=>100),
			array('estado', 'length', 'max'=>1),
			array('fecha', 'safe'),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idpuntos, idcliente, fecha, descripcion, entrada, salida, estado', 'safe', 'on'=>'search'),
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
			'idcliente0' => array(self::BELONGS_TO, 'Cliente', 'idcliente'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idpuntos' => 'Idpuntos',
			'idcliente' => 'Idcliente',
			'fecha' => 'Fecha',
			'descripcion' => 'Descripcion',
			'entrada' => 'Entrada',
			'salida' => 'Salida',
			'estado' => 'Estado',
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

		$criteria->compare('idpuntos',$this->idpuntos);
		$criteria->compare('idcliente',$this->idcliente);
		$criteria->compare('fecha',$this->fecha,true);
		$criteria->compare('descripcion',$this->descripcion,true);
		$criteria->compare('entrada',$this->entrada);
		$criteria->compare('salida',$this->salida);
		$criteria->compare('estado',$this->estado,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}