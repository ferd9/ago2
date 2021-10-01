<?php

/**
 * This is the model class for table "ago.control_estado_garantia".
 *
 * The followings are the available columns in table 'ago.control_estado_garantia':
 * @property integer $idgarantia
 * @property integer $idestado_garantia
 * @property string $fecha_estado
 * @property string $descripcion
 */
class ControlEstadoGarantia extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return ControlEstadoGarantia the static model class
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
		return 'control_estado_garantia';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('idgarantia, idestado_garantia, fecha_estado', 'required'),
			array('idgarantia, idestado_garantia', 'numerical', 'integerOnly'=>true),
			array('descripcion', 'length', 'max'=>200),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idgarantia, idestado_garantia, fecha_estado, descripcion', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idgarantia' => 'Idgarantia',
			'idestado_garantia' => 'Idestado Garantia',
			'fecha_estado' => 'Fecha Estado',
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

		$criteria->compare('idgarantia',$this->idgarantia);
		$criteria->compare('idestado_garantia',$this->idestado_garantia);
		$criteria->compare('fecha_estado',$this->fecha_estado,true);
		$criteria->compare('descripcion',$this->descripcion,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}