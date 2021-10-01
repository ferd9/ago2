<?php

/**
 * This is the model class for table "servicio".
 *
 * The followings are the available columns in table 'servicio':
 * @property integer $idservicio
 * @property string $nombreservicio
 * @property string $precioservicio
 * @property integer $idtipo_moneda
 *
 * The followings are the available model relations:
 * @property TipoMoneda $idtipoMoneda0
 */
class Servicio extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Servicio the static model class
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
		return 'servicio';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nombreservicio, precioservicio, idtipo_moneda', 'required'),
			array('idtipo_moneda', 'numerical', 'integerOnly'=>true),
			array('nombreservicio', 'length', 'max'=>200),
			array('precioservicio', 'length', 'max'=>9),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idservicio, nombreservicio, precioservicio, idtipo_moneda', 'safe', 'on'=>'search'),
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
			'idtipoMoneda0' => array(self::BELONGS_TO, 'TipoMoneda', 'idtipo_moneda'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idservicio' => 'Idservicio',
			'nombreservicio' => 'Nombreservicio',
			'precioservicio' => 'Precioservicio',
			'idtipo_moneda' => 'Idtipo Moneda',
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

		$criteria->compare('idservicio',$this->idservicio);
		$criteria->compare('nombreservicio',$this->nombreservicio,true);
		$criteria->compare('precioservicio',$this->precioservicio,true);
		$criteria->compare('idtipo_moneda',$this->idtipo_moneda);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}