<?php

/**
 * This is the model class for table "activarcaja".
 *
 * The followings are the available columns in table 'activarcaja':
 * @property string $fechactivar
 * @property string $horactivar
 * @property string $estadoactivar
 */
class Activarcaja extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Activarcaja the static model class
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
		return 'activarcaja';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('fechactivar, horactivar', 'required'),
			array('estadoactivar', 'length', 'max'=>1),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('fechactivar, horactivar, estadoactivar', 'safe', 'on'=>'search'),
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
			'fechactivar' => 'Fechactivar',
			'horactivar' => 'Horactivar',
			'estadoactivar' => 'Estadoactivar',
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

		$criteria->compare('fechactivar',$this->fechactivar,true);
		$criteria->compare('horactivar',$this->horactivar,true);
		$criteria->compare('estadoactivar',$this->estadoactivar,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}