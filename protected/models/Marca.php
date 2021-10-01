<?php

/**
 * This is the model class for table "ago.marca".
 *
 * The followings are the available columns in table 'ago.marca':
 * @property integer $idmarca
 * @property integer $idcategoria
 * @property string $descripcion
 *
 * The followings are the available model relations:
 * @property Categoria $idcategoria0
 * @property Modelo[] $modelos
 */
class Marca extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Marca the static model class
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
		return 'marca';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('descripcion', 'length', 'max'=>105),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idmarca, idcategoria, descripcion', 'safe', 'on'=>'search'),
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
			'idcategoria0' => array(self::BELONGS_TO, 'Categoria', 'idcategoria'),
			'modelos' => array(self::HAS_MANY, 'Modelo', 'idcategoria'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idmarca' => 'Idmarca',
			'idcategoria' => 'Idcategoria',
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

		$criteria->compare('idmarca',$this->idmarca);
		$criteria->compare('idcategoria',$this->idcategoria);
		$criteria->compare('descripcion',$this->descripcion,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}
}