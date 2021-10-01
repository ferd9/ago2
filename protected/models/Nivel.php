<?php

/**
 * This is the model class for table "ago.nivel".
 *
 * The followings are the available columns in table 'ago.nivel':
 * @property integer $idnivel
 * @property integer $perfil
 * @property string $descripcion
 *
 * The followings are the available model relations:
 * @property Perfil $perfil0
 * @property Usuario[] $usuarios
 */
class Nivel extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Nivel the static model class
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
		return 'nivel';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('perfil, descripcion', 'required'),
			array('perfil', 'numerical', 'integerOnly'=>true),
			array('descripcion', 'length', 'max'=>45),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idnivel, perfil, descripcion', 'safe', 'on'=>'search'),
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
			'perfil0' => array(self::BELONGS_TO, 'Perfil', 'perfil'),
			'usuarios' => array(self::HAS_MANY, 'Usuario', 'nivel'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idnivel' => 'Idnivel',
			'perfil' => 'Perfil',
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

		$criteria->compare('idnivel',$this->idnivel);
		$criteria->compare('perfil',$this->perfil);
		$criteria->compare('descripcion',$this->descripcion,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}