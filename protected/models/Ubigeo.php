<?php

/**
 * This is the model class for table "ago.ubigeo".
 *
 * The followings are the available columns in table 'ago.ubigeo':
 * @property integer $idubigeo
 * @property string $coddpto
 * @property string $codprov
 * @property string $coddist
 * @property string $nombre
 *
 * The followings are the available model relations:
 * @property Persona[] $personas
 */
class Ubigeo extends CActiveRecord
{
	/**
	 * Returns the static model of the specified AR class.
	 * @return Ubigeo the static model class
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
		return 'ubigeo';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('coddpto, codprov, coddist, nombre', 'required'),
			array('coddpto, codprov, coddist', 'length', 'max'=>2),
			array('nombre', 'length', 'max'=>50),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('idubigeo, coddpto, codprov, coddist, nombre', 'safe', 'on'=>'search'),
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
			'personas' => array(self::HAS_MANY, 'Persona', 'ubigeo'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idubigeo' => 'Idubigeo',
			'coddpto' => 'Coddpto',
			'codprov' => 'Codprov',
			'coddist' => 'Coddist',
			'nombre' => 'Nombre',
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

		$criteria->compare('idubigeo',$this->idubigeo);
		$criteria->compare('coddpto',$this->coddpto,true);
		$criteria->compare('codprov',$this->codprov,true);
		$criteria->compare('coddist',$this->coddist,true);
		$criteria->compare('nombre',$this->nombre,true);

		return new CActiveDataProvider(get_class($this), array(
			'criteria'=>$criteria,
		));
	}

        public static function getDepartamento()
        {
            $depar = new CDbCriteria;
            $depar->order = 'nombre asc';
            $depar->group = 'coddpto';
            $listDepar = array();
            $listDepar =CHtml::listData(self::model()->findAll($depar),'coddpto','nombre');
            return $listDepar;
        }
}